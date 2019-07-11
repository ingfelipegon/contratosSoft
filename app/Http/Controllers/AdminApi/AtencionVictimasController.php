<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadAtencionVictimas;
use App\Models\VsaadMunicipios;
use App\Models\VsaadDepartamentos;
use App\Models\VsaadResponsables;
use App\Models\VsaadAllegadosFamiliares;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AtencionVictimasResource;
use Log;
use PDF;


class AtencionVictimasController extends Controller
{
  public function index()
  {
      return AtencionVictimasResource::collection(VsaadAtencionVictimas::all());
  }
  public function verificar_identificacion($identificacion)
    {
        // return VsaadMunicipios::where('departamento_id',$department_id)->get(['id','nombre','departamento_id']);
        $encontrado=VsaadAtencionVictimas::where('no_identificacion',$identificacion)->first();
        if(!empty($encontrado->id))
        {return 1;}
        else
        {return 0;}


        // Log::info("Encontrado = ".$encontrado);
    }
  public function store(Request $request)
  {
      Log::info($request);

      $data=$request->all();
      $atencion_creada= VsaadAtencionVictimas::create($data);

      /////////RESPONSABLES
      if(!empty($data['presuntos_responsables']) && $data['presuntos_responsables'][0]["nombre_responsable"] != NULL)
      // if($request->get('educacion'))
      {
        $responsables=$data['presuntos_responsables'];
        foreach ($responsables as $respon) {
            Log::info($respon);
          // $educa['abogado_id']=$abogado->id;
            $tmp=VsaadResponsables::create($respon);
            $atencion_creada->responsables()->save($tmp);
        }
      }
      //////////////////

      /////////ALLEGADOS FAMILIARES

      if(!empty($data['allegados_familiares']) && $data['allegados_familiares'][0]["nombre_allegado"] != NULL)
      {
        $allegados=$data['allegados_familiares'];
        foreach ($allegados as $alle) {
          $tmp=VsaadAllegadosFamiliares::create($alle);
          $atencion_creada->allegados_familiares()->save($tmp);
        }
      }
      //////////////////



      $res_atencion=new AtencionVictimasResource($atencion_creada);
      return response(['message'=>'Registro creado', 'registro'=>$res_atencion]);
  }

  public function update(Request $request, VsaadAtencionVictimas $atencion)
  {

      $data=$request->all();

      $atencion->update($data);


      ////////RESPONSABLES
      $responsable=$request->get('presuntos_responsables');
      $new_respon_ids=array_map(function($item){return $item['id'];},$responsable);
      $after_respon_ids=array($atencion->responsables->map(function($item){return $item->id;}));
      $ids_to_remove=array_diff($after_respon_ids,$new_respon_ids);
      foreach ($after_respon_ids as $ids_delete_item) {
        foreach ($ids_delete_item as $ids_delete) {
              if (!in_array($ids_delete, $new_respon_ids)) {
                VsaadResponsables::destroy($ids_delete);
              }
        }
      }

      foreach ($responsable as $presunto) {

        $presunto['atencion_id']=$atencion->id;

        if ($presunto['id']!=-1 && $atencion->responsables()->where('id',$presunto['id'])->first())  $atencion->responsables()->where('id',$presunto['id'])->update($presunto);
        else VsaadResponsables::create($presunto);

      }
      ////////////////

      ///////FAMILIARES ALLEGADOS
      $fami_alle=$request->get('allegados_familiares');
      $new_fami_ids=array_map(function($item){return $item['id'];},$fami_alle);
      $after_fami_ids=array($atencion->allegados_familiares->map(function($item){return $item->id;}));
      $ids_to_remove=array_diff($after_fami_ids,$new_fami_ids);
      foreach ($after_fami_ids as $ids_delete_item) {
        foreach ($ids_delete_item as $ids_delete) {
              if (!in_array($ids_delete, $new_fami_ids)) {
                VsaadAllegadosFamiliares::destroy($ids_delete);
              }
        }
      }

      foreach ($fami_alle as $alle) {

        $alle['atencion_id']=$atencion->id;
        if ($alle['id']!=-1 && $atencion->allegados_familiares()->where('id',$alle['id'])->first())  $atencion->allegados_familiares()->where('id',$alle['id'])->update($alle);
        else VsaadAllegadosFamiliares::create($alle);

      }
      ////////////////



      $res_atencion=new AtencionVictimasResource($atencion);
      return response(['message'=>'Registro actualizado', 'registro'=>$res_atencion]);

  }

  public function destroy(VsaadAbogado $abogado)
  {
    // $abogado = VsaadAbogado::find($id);
    // Log::info($abogado);

// delete related
    $abogado->responsables()->delete();
    $abogado->allegados_familiares()->delete();

    $abogado->delete();
    return response(['message'=>'Registro borrado', 'registro'=>$abogado]);

      // $this->educacion()->delete();
      // VsaadabogadoEducacion::
      // return VsaadAbogado::destroy($id);
  }
  public function exportar_pdf(Request $request){


        // $id=$request->input('person_id');
        // $person=Person::with('gender','facts','ethnicity')->find($id);
        // $filename= $person->firstname.'_'.$person->lastname.'.pdf';
        //
        // $otrosDocumentos=null;
        // $beneficios=null;
        // $peticiones=null;
        //
        // $person->document_number =trim($person->document_number);
        // $person->firstname =trim($person->firstname);
        // $person->lastname=trim($person->lastname);
        //
        // if($person->document_number || ($person->firstname && $person->lastname && !in_array($person->firstname,$this->forbidden_names) &&  !in_array($person->lastname,$this->forbidden_names))){
        //
        //
        //       $beneficios= collect($this->getBeneficios($person->document_number,$person->firstname,$person->lastname))->unique('subcategoria');
        //       $peticiones= collect($this->getPeticiones($person->document_number,$person->firstname,$person->lastname));
        //       $otrosDocumentos= collect($this->getOtrosDocs($person->document_number,$person->firstname,$person->lastname));
        //
        //
        // }
        //
        // $session = $request->getSession();
        // $session->save();
        $data=$request->all();
        $municipio_id=$request->input('municipio_id');
        if($municipio_id)
        {$municipio_nombre=VsaadMunicipios::find($municipio_id);
        $data["municipio_id"]=$municipio_nombre->nombre;}

        $departamento_id=$request->input('departamento_id');

        if($departamento_id)
        {$departamento_nombre=VsaadDepartamentos::find($departamento_id);
        $data["departamento_id"]=$departamento_nombre->nombre;}

        $municipio_hechos_id=$request->input('municipio_hechos_id');
        if($municipio_hechos_id)
        {$municipio_hechos_nombre=VsaadMunicipios::find($municipio_hechos_id);
        $data["municipio_hechos_id"]=$municipio_hechos_nombre->nombre;}

        $departamento_hechos_id=$request->input('departamento_hechos_id');

        if($departamento_hechos_id)
        {$departamento_hechos_nombre=VsaadDepartamentos::find($departamento_hechos_id);
        $data["departamento_hechos_id"]=$departamento_hechos_nombre->nombre;}

        $familiares=$request->input("allegados_familiares");
        $responsables=$request->input("presuntos_responsables");
        Log::info($data);
        // Log::info("Munipcio nombre = ".$data["municipio_nombre"]);
        // Log::info("Munipcio id corchete = ".$data["municpio_id"]);
        Log::info("Munipcio id  = ".$data["municipio_id"]);
        // Log::info("Munipcio nombre = ".$data["municipio_nombre"]);
        $pdf = PDF::loadView('formulario_pdf', ['datos'=>$data,'familiares'=>collect($familiares),'responsables'=>collect($responsables)]);
        // $pdf = PDF::loadView('formulario_pdf', ['person'=>'Hola mundo']);
        // $pdf->setOption('cookie',[$session->getName() => $session->getId()]);
        // $pdf->setOption('viewport-size','1024x768pdf');
        $filename="formulario_registro.pdf";

        return $pdf->download($filename);



    }
}
