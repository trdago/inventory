<?php

namespace App\Http\Controllers;
use App\Http\Requests\TipoAdd;
use Illuminate\Http\Request;
use App\Http\Requests\TipoGet;
use App\Tipo;
use App\Unidad;
use App\Clasificacion;

class TipoController extends Controller
{

    public function getTipo(TipoGet $rq)
    {
        // dd("buscar");
        $resp = [];
        $resp['result'] = false;
        
        try {
            
            $tipos = Tipo::with('unidad_almacenamiento', 'unidad_entrega')->where('clasificacion_id', $rq->clasificacion)->get();

            $resp['tipos'] = $tipos;
            $resp['result'] = true;

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $resp['error'] = 'Producto no encontrado';
            
        }
        
        return response()->json($resp, 200);

    }

    public function addView()
    {

    	$clasificaciones = Clasificacion::All();
    	// dd($clasificaciones);
    	$tipos = Unidad::All();
    	return View('tipo.add', compact('tipos', 'clasificaciones'));
    }

    public function add(TipoAdd $rq)
    {
    	$id=0;
    	try
    	{
	    	$tipo = New Tipo();
		    $tipo->nombre = $rq->nombre;
		    $tipo->existencia_unidad_entrega = 0;
		    $tipo->existencia_unidad_almacenamiento = 0;
		    $tipo->unidad_entrega_id = $rq->entrega;
		    $tipo->unidad_almacenamiento_id = $rq->almacenamiento;
		    $tipo->clasificacion_id = $rq->clasificacion;
		    $tipo->save();

		    $id=$tipo->id;

    	}
    	catch(\Illuminate\Database\QueryException $e)
    	{
    		// dd($e);
			$this->log("tipo", "Error insert tipo", "", "");

			$msg=$tipo->nombre." Error Al Intentar insertar Revisa el log";
		return redirect('admin/producto')
	      ->with('msg', ['class'=>'alert-danger', 
	      'icon'=>'glyphicon-error', 
	      'msg'=> $msg]);
    		
    	}

	$this->log("tipo", "insert tipo id: ".$id , "", "");
	$msg=$tipo->nombre." Ingresado de forma Correcta";
	return redirect('admin/producto')
      ->with('msg', ['class'=>'alert-success', 
      'icon'=>'glyphicon-ok', 
      'msg'=> $msg]);

    }
}
