<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadidentidadGenero extends Model
{
  protected $table = 'vsaad_identidades_generos';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','identidades_generos_id');
  }

}
