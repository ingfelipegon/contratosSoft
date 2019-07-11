<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadDependencia extends Model
{
  protected $table = 'vsaad_dependencias';
  protected $hidden =['created_at','updated_at'];

  public function usuarios()
  {
    return $this->hasMany('App\Models\User','dependencia_id');
  }
}
