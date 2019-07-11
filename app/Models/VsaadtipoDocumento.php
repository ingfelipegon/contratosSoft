<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadtipoDocumento extends Model
{
  protected $table = 'vsaad_tipos_documentos';
  protected $hidden =['created_at','updated_at'];


  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','tipos_documentos_id');
  }
  public function atencion_victima()
  {
    return $this->hasMany('App\Models\SaadAbogado','tipos_documentos_id');
  }
}
