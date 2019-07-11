<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadpertenenciaEtnia extends Model
{
  protected $table = 'vsaad_pertenencias_etnias';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','etnia_id');
  }

}
