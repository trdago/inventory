<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //

    protected $table='log';

    protected $fillable=[
    					'id',
						'fecha',
						'tabla',
						'accion',
						'valor_antiguo',
						'valor_nuevo',
						'user_id',
						'ip'
    					];
}
