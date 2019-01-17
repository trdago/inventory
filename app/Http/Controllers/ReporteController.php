<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use guzzlehttp\client;


class ReporteController extends Controller
{

    public function orden ($orden)
    {
    
   //
    $numorden = $orden;
    $ticket = "97A92C66-BE35-4791-8EF2-716E3D523DCB";
    $urlorden = "http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json?codigo=".$numorden."&ticket=".$ticket."";

    return view('reporte.orden', compact('numorden', 'ticket', 'urlorden'));
    }


    public function compra(Request  $rq)
    {
    

   //
    //$numorden = $orden;
    $ticket = "97A92C66-BE35-4791-8EF2-716E3D523DCB";

    $fecha  = new Carbon($rq->fecha);
    
    if(!isset($rq->fecha))
        $fecha = new Carbon();

    // dd($fecha);
    // $hoy = new Carbon();
    // $fecha::fromSerialized($hoy)->format('Y-m-d');
    $fecha->now();
    $day = $fecha->day;
    $month = $fecha->month;

    
    if($day<10)
        $day = '0'.$day;  
          
    if($month<10)
        $month = '0'.$month;


    $hoy = $day .''. $month .''. $fecha->year  ;
    // dd($hoy);

    $urlorden = "http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json?fecha=".$hoy."&CodigoOrganismo=6946&ticket=".$ticket."";
    // $urlorden = "http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json?ticket=".$ticket."";
    // dd($urlorden);
    return view('reporte.compra', compact('hoy', 'ticket', 'urlorden'));
    }
}