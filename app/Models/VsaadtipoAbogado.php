<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadtipoAbogado extends Model
{
  protected $table = 'vsaad_tipos_abogados';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','tipos_abogados_id');
  }

}
