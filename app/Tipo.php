<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //

    protected $table='tipo';

    protected $fillable=[
						"nombre",
						"existencia_unidad_entrega",
						"existencia_unidad_almacenamiento",
						"unidad_entrega_id",
						"unidad_almacenamiento_id",
						"clasificacion_id",
    					];

   	public function unidad_entrega()
	{
	    return $this->belongsTo('App\Unidad');
	}

   	public function unidad_almacenamiento()
	{
	    return $this->belongsTo('App\Unidad');
	}  
	public function clasificacion()
	{
	    return $this->belongsTo('App\Clasificacion');
	}
}
