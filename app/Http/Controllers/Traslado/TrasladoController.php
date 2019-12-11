<?php

namespace App\Http\Controllers\Traslado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bloque;
use App\Models\Persona;
use App\Models\Respuesta;
use App\Models\Traslado;
use Illuminate\Support\Facades\DB;

class TrasladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bloque $bloque, Persona $persona)
    {
        $bloques = $persona->bloques()
                        ->get();
                        // ->unique()
                        // ->values();

        return response()->json(['data'=>$bloques], 200);        
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $traslados = $request->all();
        $trasladosRegistrados = [];
        $trasladosRegistrados = DB::transaction(function() use ($traslados, $trasladosRegistrados)
        {
            foreach ( $traslados as $traslado) {
                $objTraslado = new Traslado();
                $objTraslado->bloque_id = $traslado['bloque_id'];
                $objTraslado->persona_id = $traslado['persona_id'];     
                $objTraslado->representante_id = $traslado['representante_id'];  
                $objTraslado->observaciones = $traslado['observaciones'];                  
                $objTraslado->save();
                $trasladosRegistrados->push($objTraslado);

                if(isset($traslado['respuestas'])){
                    foreach ( $traslado['respuestas'] as $respuesta) {
                        $objRespuesta = new Respuesta();
                        $objRespuesta->respuesta = $respuesta->respuesta;    
                        $objRespuesta->traslado_id = $objTraslado->id;   
                        $objRespuesta->pregunta_id = $respuesta->pregunta_id;   
                        $objRespuesta->fase_id = $respuesta->fase_id;    
                        $objRespuesta->save();
                    }
                }
            }            
            return $trasladosRegistrados;
        });                

        return response(['message'=>'El traslado se registro correctamente', 'traslados'=>$trasladosRegistrados]);
    }

    public function creacionTramites(Request $request)
  {
    // $reglas = [
    //   'selected_temas' => 'array|min:0',
    //   'selected_personas' => 'array|min:0',
    //   'fecha_inicio' => 'required|date',
    //   'descripcion' => 'required|string'
    // ];
      Log::info('enta a creación de tramite');
    // $this->validate($request, $reglas);
    $tramites = [];
    $tramites_nuevos = $request->all();
    // $tramites_nuevos = json_decode($tramites_nuevos, true);

    $tramites = DB::transaction(function() use ($tramites_nuevos, $tramites)
    {

      $corporacion = Auth::user()->corporacion;
      // Log::info($tramites_nuevos);
      // $radicado = Radicado::find($tramites_nuevos[0]['radicado_id']);
      // Log::info($radicado);
     // $actuacion_sistema = new ActuacionSistema();
      $actuacion_sistema = ActuacionSistema::getOpcionXGrupoXAbreviatura('actuacion_sistema','CT');

      //Crear los tramites correspondientes a los selected_temas
      foreach ( $tramites_nuevos as $tramite_nuevo) {
        // Log::info($tramite_nuevo['tema_principal']);
        // $tema_principal = Tema::find($tramite_nuevo['tema_principal']['id']);
        $tema_principal = $tramite_nuevo['tema_principal'];
       // Log::info($tema_principal);
        $tramite = new Tramite();
        $tramite->codigo = 'Pendiente';
        $tramite->fecha_inicio = $tramite_nuevo['fecha_inicio'];
        $tramite->corporacion_id = $corporacion->id;
        $tramite->tema_principal_id = $tema_principal['id'];
        $tramite->descripcion = $tramite_nuevo['descripcion'];
        $tramite->termino_acumulado = $tema_principal['termino'];
        $tramite->codigo = 'pte';
        $tramite->save();

        $selected_temas_id = array_column($tramite_nuevo['selected_temas'], 'id');
        $tramite->temas()->sync($selected_temas_id);

        //Log::info($tramite);
        $temasTramite = TemaTramite::where('tramite_id', $tramite->id)->get();
        //Log::info($temasTramite);
        // $abreviaturas_temas = '';

        // foreach ( $temasTramite as $temaTramite) {
        // //  Log::info($temaTramite);
        //   $abreviaturas_temas .= '-'.$temaTramite->tema->abreviatura;
        // }
       // Log::info('Abreviaturas: ');
      //  Log::info($abreviaturas_temas);
        // $abreviaturas_temas=substr($abreviaturas_temas,1); //Quita el primer guión de la concatenación del foreach anterior
        //$tramite->codigo = $abreviaturas_temas.'-'.$corporacion->codigo.'-'.$tramite->id;
        $tramite->codigo = Carbon::now()->timestamp.'-'.$tramite->id;
        $tramite->save();

        //Trámites padres
        if(isset($tramite_nuevo['padres'])){

          $tramite->padres()->sync($tramite_nuevo['padres']);

          foreach ( $tramite_nuevo['padres'] as $padre_id) {
            $tramitePadre = Tramite::find($padre_id);
            $tramitePadre->es_tramite_padre = true;
            $tramitePadre->save();
          }
        }


        // Log::info($tramite);

        // $tramites.push($tramite);

        //Crear las actuaciones de creación para la corporación que está radicando por cada trámite
        $actuacion_tramite = new ActuacionTramite();
        $actuacion_tramite->corporacion_ejecutora_id = $corporacion->id;
        $actuacion_tramite->usuario_ejecutor_id = Auth::user()->id;
        $actuacion_tramite->corporacion_receptora_id = $corporacion->id;
        $actuacion_tramite->actuacion_sistema_id = $actuacion_sistema->id;
        $actuacion_tramite->tramite_id = $tramite->id;
        $actuacion_tramite->codigo = $tramite->codigo;
        $actuacion_tramite->descripcion = $actuacion_sistema->valor_texto;
        $actuacion_tramite->fecha_actuacion = $tramite_nuevo['fecha_inicio'];
        $actuacion_tramite->termino_adicional = $tema_principal['termino'];
        $actuacion_tramite->save();

        //Envia notificación a los usuarios ---> es un ejemplo para test
        // $destinatarios = Usuario::all()->filter(function($user){
        //   return $user->hasRole('Super Administrador');
        // });

        // Notification::send($destinatarios, new ActuacionRealizada($actuacion_sistema));
        $selected_personas = $tramite_nuevo['selected_personas'];
        //Asociar las tablas personas, trámite y radicados en la tabla PersonaRadicadoTramite
        foreach ( $selected_personas as $persona) {
          foreach ( $persona['radicados'] as $radicado) { //$tramite_nuevo['numeros_radicado_orfeo'] cambiarlo por $persona['radicados']
            $persona_radicado_tramite = new PersonaRadicadoTramite();
            $persona_radicado_tramite->radicado_id = $radicado['id'];
            $persona_radicado_tramite->tramite_id = $tramite->id;
            $persona_radicado_tramite->persona_id = $persona['id'];
            $persona_radicado_tramite->save();
          }
        }

        //Notificación a si misma (a la subsecretaria)
        $corporacion_tema_principal = Corporacion::find($tema_principal['corporacion_id']);
         Notification::send($corporacion_tema_principal->responsable(), new TramiteAsignado($tramite));
      }

      return $tramites;

    });

   return $tramites; //$this->showOne($radicado, 201);

  }
}
