<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadPerfil extends Model
{
  protected $table = 'vsaad_perfiles';
  protected $hidden =['created_at','updated_at'];

  public function usuarios()
  {
    return $this->hasMany('App\Models\User','perfil_id');
  }
}
