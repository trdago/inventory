<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use App\Log;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function log($tabla, $accion, $antiguo, $nuevo)
    {
    	/*
    	*	fecha 
    	*	tabla
    	* 	accion
    	* 	valor_antiguo
    	* 	valor_nuevo
    	* 	user_id
    	* 	ip
    	*/

    	$log = new Log();
    	$log->fecha = new Carbon();
    	$log->tabla = $tabla;
    	$log->accion = $accion;
    	$log->valor_antiguo = $antiguo;
    	$log->valor_nuevo = $nuevo;
    	$log->user_id = Auth()->user()->id;
    	// cuando este en linux este comando funcionara
    	// $log->ip = "'".$_SERVER['REMOTE_ADDR']."'";
    	$log->save();

        return $log->id;
    }

}
