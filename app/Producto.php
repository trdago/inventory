<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //

    protected $table='productos';

    protected $fillable=[
    				"isfull",
    				"item_list_mercado",
					"tipo_id",
					"codigo_producto_mercado",
					"orden_compras_mercado",
					"descripcion_mercado",
					"descripcion",
					"moneda",
					"fecha_ingreso",
					"fecha_termino",
					"capacidad_disponible",
					"capacidad_total",
					"unidad_ingreso_id",
					"log_id",
					"estado_id",
					"barcode"
    					];

   	public function tipo()
	{
	    return $this->belongsTo('App\Tipo');
	}
   	public function unidad_ingreso()
	{
	    return $this->belongsTo('App\Unidad');
	}

 	public function unidad_entrega()
	{
	    return $this->belongsTo('App\Unidad');
	}
}
