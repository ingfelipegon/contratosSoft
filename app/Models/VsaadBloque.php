<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadBloque extends Model
{
  protected $table = 'vsaad_bloques';
  protected $hidden =['created_at','updated_at'];

  public function frentes()
      {
          return $this->hasMany('App\Models\VsaadFrentes','bloque_id');
      }
  public function presunto_responsable()
  {
    return $this->hasMany('App\Models\VsaadResponsables','bloque_id');
  }

}
