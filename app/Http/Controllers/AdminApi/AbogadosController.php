<?php

namespace App\Http\Controllers\AdminApi;

use App\Models\VsaadAbogado;
use App\Models\VsaadabogadoEducacion;
use App\Models\VsaadabogadoExperiencia;
use App\Models\VsaadabogadoApoderado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AbogadoResource;
use Log;


class AbogadosController extends Controller
{
  public function index()
  {
      return AbogadoResource::collection(VsaadAbogado::all());
  }

  public function store(Request $request)
  {
      // Log::info($request);

      $data=$request->all();
      $abogado= VsaadAbogado::create($data);

      /////////EDUCACION
      if(!empty($data['educacion']) && $data['educacion'][0]["universidad"] != NULL)
      // if($request->get('educacion'))
      {
        $educacion=$data['educacion'];
        foreach ($educacion as $educa) {
            Log::info($educa);
          // $educa['abogado_id']=$abogado->id;
            $tmp=VsaadabogadoEducacion::create($educa);
            $abogado->educacion()->save($tmp);
        }
      }
      //////////////////

      /////////EXPERIENCIA

      if(!empty($data['experiencia']) && $data['experiencia'][0]["cargo"] != NULL)
      {
        $experiencia=$data['experiencia'];
        foreach ($experiencia as $exper) {
          $tmp=VsaadabogadoExperiencia::create($exper);
          $abogado->experiencia()->save($tmp);
        }
      }
      //////////////////

      /////////APODERADO

      if(!empty($data['apoderado']) && $data['apoderado'][0]["documento"] != NULL)
      {
        $apoderado=$data['apoderado'];
        foreach ($apoderado as $apodera) {
          $tmp=VsaadabogadoApoderado::create($apodera);
          $abogado->apoderado()->save($tmp);
        }
      }
      //////////////////
      // if($request->get('experiencia'))
      // {
      //   $experiencia=$request->get('experiencia');
      //     foreach ($experiencia as $exper) {
      //       $exper['abogado_id']=$abogado->id;
      //       VsaadabogadoExperiencia::create($exper);
      //     }
      // }
      //////////////////

      $res_abogado=new AbogadoResource($abogado);
      return response(['message'=>'Abogado registrado', 'abogado'=>$res_abogado]);
  }

  public function update(Request $request, VsaadAbogado $abogado)
  {
      $request->validate([
      'correo'=>'required|email',
        'tarjeta_profesional'=>'required',
      ]);
      $data=$request->all();

      $abogado->update($data);


      ////////EDUCACION
      $educacion=$request->get('educacion');
      $new_educa_ids=array_map(function($item){return $item['id'];},$educacion);
      $after_educa_ids=array($abogado->educacion->map(function($item){return $item->id;}));
      $ids_to_remove=array_diff($after_educa_ids,$new_educa_ids);
      foreach ($after_educa_ids as $ids_delete_item) {
        foreach ($ids_delete_item as $ids_delete) {
              if (!in_array($ids_delete, $new_educa_ids)) {
                VsaadabogadoEducacion::destroy($ids_delete);
              }
        }
      }

      foreach ($educacion as $educa) {

        $educa['abogado_id']=$abogado->id;

        if ($educa['id']!=-1 && $abogado->educacion()->where('id',$educa['id'])->first())  $abogado->educacion()->where('id',$educa['id'])->update($educa);
        else VsaadabogadoEducacion::create($educa);

      }
      ////////////////

      ////////EXPERIENCIA
      $experiencia=$request->get('experiencia');
      $new_exper_ids=array_map(function($item){return $item['id'];},$experiencia);
      $after_exper_ids=array($abogado->experiencia->map(function($item){return $item->id;}));
      $ids_to_remove=array_diff($after_exper_ids,$new_exper_ids);
      foreach ($after_exper_ids as $ids_delete_item) {
        foreach ($ids_delete_item as $ids_delete) {
              if (!in_array($ids_delete, $new_exper_ids)) {
                VsaadabogadoExperiencia::destroy($ids_delete);
              }
        }
      }

      foreach ($experiencia as $exper) {

        $exper['abogado_id']=$abogado->id;
        if ($exper['id']!=-1 && $abogado->experiencia()->where('id',$exper['id'])->first())  $abogado->experiencia()->where('id',$exper['id'])->update($exper);
        else VsaadabogadoExperiencia::create($exper);

      }
      ////////////////

      ////////APODERADO

      if(!empty($data['apoderado']))
      {
        $apoderado=$data['apoderado'];
        $new_apodera_ids=array_map(function($item){return $item['id'];},$apoderado);
        $after_apodera_ids=array($abogado->$apoderado->map(function($item){return $item->id;}));
        $ids_to_remove=array_diff($after_apodera_ids,$new_apodera_ids);
        foreach ($after_apodera_ids as $ids_delete_item) {
          foreach ($ids_delete_item as $ids_delete) {
                if (!in_array($ids_delete, $new_apodera_ids)) {
                  VsaadabogadoApoderado::destroy($ids_delete);
                }
          }
        }

        foreach ($apoderado as $apodera) {

          $apodera['abogado_id']=$abogado->id;
          if ($apodera['id']!=-1 && $abogado->apoderado()->where('id',$apodera['id'])->first())  $abogado->apoderado()->where('id',$apodera['id'])->update($apodera);
          else VsaadabogadoExperiencia::create($apodera);

        }
      }
      ////////////////

      $res_abogado=new AbogadoResource($abogado);
      return response(['message'=>'Abogado actualizado', 'abogado'=>$res_abogado]);

  }

  public function destroy(VsaadAbogado $abogado)
  {
    // $abogado = VsaadAbogado::find($id);
    // Log::info($abogado);

// delete related
    $abogado->educacion()->delete();
    $abogado->experiencia()->delete();
    $abogado->apoderado()->delete();

    $abogado->delete();
    return response(['message'=>'Abogado borrado', 'abogado'=>$abogado]);
  }
}
