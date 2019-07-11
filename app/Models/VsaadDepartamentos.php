<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadDepartamentos extends Model
{
    protected $table = 'vsaad_departamentos';
    public function municipios()
		    {
		        return $this->hasMany('App\Models\VsaadMunicipios','departamento_id');
		    }
        public function atencion_victima()
        {
          return $this->hasMany('App\Models\VsaadAtencionVictimas','departamento_id');
        }
        public function atencion_victima_hechos()
        {
          return $this->hasMany('App\Models\VsaadAtencionVictimas','departamento_hechos_id');
        }
}
