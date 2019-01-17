<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispro extends Model
{
    //

    protected $table='productos_dispensados';

    protected $fillable=[
						"producto_id",
						"dispensacion_id"
    					];
}
