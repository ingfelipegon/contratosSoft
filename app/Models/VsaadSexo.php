<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadSexo extends Model
{
  protected $table = 'vsaad_sexos';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','sexo_id');
  }

}
