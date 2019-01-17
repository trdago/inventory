<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispensacion extends Model
{
    //

    protected $table='dispensacion';

    protected $fillable=[
						"id",
						"admin_user_id",
						"cliente_user_id",
						"motivo",
						"precio",
						"log_id"
    					];
}
