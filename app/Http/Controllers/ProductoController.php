<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductoAdd;
use App\Http\Requests\ProductoGet;
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Tipo;
use App\Unidad;
use App\Clasificacion;
use App\Producto;
use App\User;
use App\Dispensacion;
use App\Dispro;

class ProductoController extends Controller
{

    public function getOrdenValidacion(Request $rq)
    {
        // dd("buscar");
        $resp = [];
        $resp['result'] = false;
        
        try {
            
            $pro = Producto::where('orden_compras_mercado', $rq->orden_compras_mercado)
                    ->where('item_list_mercado', $rq->item_list_mercado)->get();

            $total_unidad = 0;

            foreach($pro as $p)
            {
                $total_unidad += $p->capacidad_total;
            }

            // validar que el producto no aya sido ingresado antes
            if(count($pro) >= 1 )
            {
                $resp['result'] = true;
                $resp['pro'] = $pro[0];
                $resp['cant'] = count($pro);
                $resp['total_unidad'] = $total_unidad;
                
                // return redirect('admin/producto')
                //   ->with('msg', ['class'=>'alert-danger', 
                //   'icon'=>'glyphicon-error', 
                //   'msg'=> $msg]);
            }

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $resp['error'] = 'Producto no encontrado';
            
        }
        
        return response()->json($resp, 200);

    }    

    public function get(ProductoGet $rq)
    {
        // dd("buscar");
        $resp = [];
        $resp['result'] = false;
        
        try {
            
            $producto = Producto::with('tipo', 'tipo.clasificacion', 'tipo.unidad_entrega', 'tipo.unidad_almacenamiento')->where('estado_id', 1)->findOrFail($rq->producto);

            $resp['producto'] = $producto;
            $resp['result'] = true;

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            $resp['error'] = 'Producto no encontrado';
            
        }
        
        return response()->json($resp, 200);

    }

    public function list()
    {
    	
    	$tipos = Tipo::with('unidad_almacenamiento', 'unidad_entrega')->get();
    	// dd($tipos);
    	return View('tipo.list', compact('tipos')); 
    }

    public function viewNuevo()
    {
        $clasificaciones = Clasificacion::orderby('nombre')->get();

        return view('producto.nuevo', compact('clasificaciones'));
    }

    public function viewAdd($id)
    {
    	$tipo = Tipo::with('unidad_almacenamiento', 'unidad_entrega')->findOrFail($id);
    	$unidades = Unidad::WhereIn('id', [$tipo->unidad_almacenamiento_id, $tipo->unidad_entrega_id ])->get();
    	// dd($unidades);

    	return view('producto.add', compact('tipo', 'unidades'));
    }

    public function confirmEntrega(Request $rq)
    {
        // dd($rq->entrega);
        $resp = [];
        $resp['result'] = false;
        
        try {
            
            // dd();
            $productos = $rq->entrega['productos'];
            $log = $this->log("sys", "Dispensacion ", "", "");

            $d = new Dispensacion();
            $d->admin_user_id = Auth::user()->id;
            $d->cliente_user_id = $rq->entrega['user']['id'];
            $d->motivo = $rq->entrega['user']['motivo'];
            $d->precio = $rq->entrega['valor_total'];
            $d->log_id = $log;

            $d->save();

            // dd($d, $rq->entrega['user']);

            foreach($productos as $i => $producto)
            {
                // echo "producccs: " .$producto['id'];
                $p = Producto::findOrFail($producto['id']);
                $t = Tipo::findOrFail($producto['tipo_id']);
                
                $dp = new  Dispro();
                $dp->producto_id = $p->id;
                $dp->dispensacion_id = $d->id;
                // dd($dp, $d);
                $dp->save();
                
                $p->isfull = 0;
                $p->capacidad_disponible -= $producto['entrego']; 

                $t->existencia_unidad_entrega -=$producto['entrego'];

                if($p->capacidad_disponible == 0)
                {
                    $p->estado_id = 3;
                    $p->fecha_termino = new Carbon();
                    $t->existencia_unidad_almacenamiento -= 1;   
                } 


                // dd($dp, $t, $p, $productos);
                $p->save();
                $t->save();
            }

            $resp['result'] = true;
            // dd($resp);

            // $resp['promise'] = $rq->entrega;

        }
        catch(\Illuminate\Database\QueryException $e)
        {
            dd($e);
            $resp['error'] = 'Error';
            
        }
        
        return response()->json($resp, 200);
    }


    public function entregaConfirm($id)
    {
        $producto = Producto::with('tipo', 'tipo.clasificacion')->findOrFail($id);

       return View('producto.entrega_confirm', compact('producto'));
    }

    public function ViewEntrega()
    {
        $users = User::orderby('apellido1', 'desc')->get();
        // dd($users);
        return View('producto.entrega', compact('users'));
    }

    public function add(ProductoAdd $rq)
    {
        // dd($rq);
    	try
    	{
    		$tipo = Tipo::findOrFail($rq->tipo);


    		$productos = array();
    		for($i=0; $i< $rq->cantidad; $i++)
    		{
		    	$ins = $this->log("producto", "insert ", "", "");
		    	$producto = New Producto();
			    $producto->isfull = true;
		    	$producto->item_list_mercado = $rq->item_list_mercado; 
			    $producto->tipo_id = $rq->tipo;
			    $producto->codigo_producto_mercado = $rq->codigo_mercado_publico;
			    $producto->orden_compras_mercado = $rq->orden_compras_mercado;
                $producto->descripcion_mercado = $rq->descripcion_mercado;
                $producto->valor_dolar = $rq->valor_dolar;
                $producto->precio_mercado_publico = $rq->precio_mercado_publico;
			    $producto->moneda = $rq->moneda;
			    $producto->descripcion = strtoupper($rq->descripcion);
			    $producto->fecha_ingreso = new Carbon();
			    $producto->fecha_termino = null;
			    $producto->capacidad_disponible = $rq->ingreso_cantidad; // esto esta dado en unidad de ingreso
			    $producto->capacidad_total = $rq->ingreso_cantidad;
			    $producto->unidad_ingreso_id = $rq->unidad_de_ingreso;
			    $producto->log_id = $ins;
			    $producto->estado_id = 1;
			    $producto->save();

			    $p = Producto::findOrFail($producto->id);
			    $p->barcode = 'data:image/png;base64,'.\DNS1D::getBarcodePNG($producto->id, "C39",3,33,array(1,1,1), true);
			    $p->save();
			    $this->log("producto", "insert producto id: ".$producto->id , "", "");
			    array_push($productos, $p);
    		}
    		// dd($productos, Collection::make($productos) );

    		$productos = Collection::make($productos);



		    if($tipo->unidad_almacenamiento_id == $producto->unidad_ingreso_id)
		    {
		    	// echo "Aumento la unidad de almacenamiento";
		    	$tipo->existencia_unidad_almacenamiento += $rq->cantidad;
		    }

		    $tipo->existencia_unidad_entrega += $rq->cantidad * $rq->ingreso_cantidad;
		    $tipo->save();

		    $ins = $this->log("tipo", "update Incremento id ".$tipo->id, "", "");

		    // return redirect('admin/producto/print')->with('productos', compact('productos'));
		    return View('producto.print', compact('productos'));

    	}
    	catch(\Illuminate\Database\QueryException $e)
    	{
    		// dd($e);
			$this->log("tipo", "Error insert producto", "", "");

			$msg=$tipo->nombre." Error Al Intentar insertar Revisa el log";
		return redirect('admin/producto')
	      ->with('msg', ['class'=>'alert-danger', 
	      'icon'=>'glyphicon-error', 
	      'msg'=> $msg]);
    		
    	}


	}
}
