<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadFrentes extends Model
{
   protected $table = 'vsaad_frentes';

    public function bloque()
	{
	  return $this->belongsTo('App\Models\VsaadBloque','bloque_id');
	}
  public function presunto_responsable()
  {
    return $this->hasMany('App\Models\VsaadResponsables','frente_id');
  }


}
