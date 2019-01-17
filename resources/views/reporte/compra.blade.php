@extends('reporte/index')
@section ('content')
      <div class="col-xs-12">
      	<header class="hero-spacer">
            <img class="pull-right" src="{{{ asset('img/logo_cti.gif') }}}" width="100" height="105">
            <div ><h4>API - HOSPITAL CLÍNICO - MERCADO PUBLICO </h4>
            </div> 
                          <div id="error">
                          </div>
        </header>
        <div class="panel panel-success">
          	                  <div class="panel-heading">
                  	 <input name="urlorden" hidden value="{{$urlorden}}" />
                    <h3 class="panel-title"><strong>DETALLE ORDEN DE COMPRA : </strong><span id="Codigo1"></span></h3>
                          
        </div>
        <div id="cargartable">
  

        </div>



<script type="text/javascript">
var url = '<?php echo $urlorden;?>'
    var formatNumber = {
     separador: ".", // separador para los miles
     sepDecimal: ',', // separador para los decimales
     formatear:function (num){
     num +='';
     var splitStr = num.split('.');
     var splitLeft = splitStr[0];
     var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
     var regx = /(\d+)(\d{3})/;
     while (regx.test(splitLeft)) {
     splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
     }
     return this.simbol + splitLeft +splitRight;
     },
     new:function(num, simbol){
     this.simbol = simbol ||'';
     return this.formatear(num);
     }
    }
$(document).ready(function()
{
   console.log(url);
	 $.ajax({
	            url: url,
	            type: 'GET',
	            success: function(data)
	            {
	            console.log(data.Cantidad);
              var items = data.Listado;

              // console.log(items);
              var contador = 0;
              var tb='<table class="table">';
              
              $.each( items, function(index, item)
              {
                var codigo = item.Codigo;
                 codigo = codigo.substr(0, 4 );
                 // console.log(codigo);
                if(3328 == codigo)
                {
                  tb+= '<tr>';
                  contador++;
                  console.log( item);
                     tb+='<td>'+item.Codigo+'</td>';
                     tb+='<td>'+item.Nombre+'</td>';

                     switch(item.CodigoEstado)
                     {
                       case 6 : tb+='<td>Aceptada </td>'
                       break
                     }
                     
                }
              });
              tb+='</table>';

              console.log(contador);
              console.log(tb);
            $("#cargartable").html(tb);


	    //         var cantidad = data.Cantidad;
	    //         if (cantidad == 0) 
	    //         {
					// var error = ('<div class="alert alert-danger">'+'NO SE HA ENCONTRADO LA ORDEN DE COMPRA, CONSULTE SU INFORMACIÓN'+'<a href="http://www.mercadopublico.cl/Portal/Modules/Site/Busquedas/BuscadorAvanzado.aspx?qs=2">'+' AQUI'+'</a>'+'</div>')
	    //             $("#error").html(error)   
	    //         }
	    //         var fecha1 =moment($("#fechacreacion").html(data.FechaCreacion)).format('DD-MM-YYYY');
	    //         $("#fechacreacion").html(fecha1);

		   //      var fecha2 =moment(data.Listado[0].Fechas.FechaEnvio).format('DD-MM-YYYY');
	    //        // alert(fecha2);
	    //         $("#FechaEnvio").html(fecha2);	

	    //         var fecha3 =moment(data.Listado[0].Fechas.FechaAceptacion).format('DD-MM-YYYY');
	    //         $("#FechaAceptacion").html(fecha3);

	    //         var fecha4 =moment(data.Listado[0].Fechas.FechaCancelacion).format('DD-MM-YYYY');
	    //         $("#FechaCancelacion").html(fecha4);

	    //         var fecha5 =moment(data.Listado[0].Fechas.FechaUltimaModificacion).format('DD-MM-YYYY');
	    //         $("#FechaUltimaModificacion").html(fecha5);

	    //         $("#Codigo").html(data.Listado[0].Codigo); 
	    //         $("#Codigo1").html(data.Listado[0].Codigo); 
	    //         $("#CodigoLicitacion").html(data.Listado[0].CodigoLicitacion); 
	    //         $("#NombreUnidad").html(data.Listado[0].Comprador.NombreUnidad);   
	    //         $("#RutUnidad").html(data.Listado[0].Comprador.RutUnidad);     
	    //         $("#Descripcion").html(data.Listado[0].Descripcion.slice(0, 50)); 
	    //         $("#EstadoProveedor").html(data.Listado[0].EstadoProveedor);         
	    //         $("#Nombre").html(data.Listado[0].Nombre);
	    //         		             	   $("#NombreContacto").html(data.Listado[0].Comprador.NombreContacto);  
	    //         		             	   $("#CargoContacto").html(data.Listado[0].Comprador.CargoContacto);  
	    //         		            	   $("#MailContacto").html(data.Listado[0].Comprador.MailContacto);   	
	    //         		            	   $("#FonoContacto").html(data.Listado[0].Comprador.FonoContacto);  
	    //          	   $("#NombrePro").html(data.Listado[0].Proveedor.Nombre);       
	    //          	   $("#rutpro").html(data.Listado[0].Proveedor.RutSucursal);                  
	    //          	   $("#contactopro").html(data.Listado[0].Proveedor.NombreContacto);   
	    //          	   $("#cargopro").html(data.Listado[0].Proveedor.CargoContacto);   	             	   
	    //          	   $("#fonopro").html(data.Listado[0].Proveedor.FonoContacto);  
	    //          	   $("#mailpro").html(data.Listado[0].Proveedor.MailContacto);
	    //          	   $("#dirpro").html(data.Listado[0].Proveedor.Direccion);
     //                             $("#Totalfinal").html(data.Listado[0].Total);
     //         	   	    					  $("#TotalNetogral").html(data.Listado[0].TotalNeto);
     //         	   	    					   $("#Descuentos").html(data.Listado[0].Descuentos);
     //         	   	    					     $("#Impuestos").html(data.Listado[0].Impuestos);
     //         	   	    					      $("#Financiamiento").html(data.Listado[0].Financiamiento);
     //         	   	    					       $("#TipoMoneda").html(data.Listado[0].TipoMoneda);


	    //          	   var list = data.Listado[0].Items.Listado;
	    //          	   // console.log(list);
	    //          	   var 	tb= '';
	             	   	

	    //          	   $.each( list, function(index, d)
		   //              {

		   //              	tb+= '<tr>';
     //            			tb+='<td>'+d.CodigoProducto+'</td>';
     //            			tb+='<td>'+d.Cantidad+'</td>';
     //            			tb+='<td>'+d.EspecificacionComprador+'</td>';
     //            			tb+='<td>'+d.EspecificacionProveedor+'</td>';
     //            			tb+='<td>'+d.PrecioNeto+'</td>';
     //            			tb+='<td class="pull-right">'+d.Total+'</td>';
     //        				tb+='</tr>';
		   //              	console.log(d);
		   //              	console.log(d.Cantidad);
     //         	   	    //     $("#CodigoProducto").html(data.Listado[0].Items.Listado[0].CodigoProducto);
     //         	   	    //     $("#EspecificacionComprador").html(data.Listado[0].Items.Listado[0].EspecificacionComprador);
     //         	   	    //     $("#EspecificacionProveedor").html(data.Listado[0].Items.Listado[0].EspecificacionProveedor);
     //         	   	    //     $("#PrecioNeto").html(data.Listado[0].Items.Listado[0].PrecioNeto);
     //         	   	    //     $("#Total").html(data.Listado[0].Items.Listado[0].Total);

		   //              });

	    //                 	$("#cargartable").html(tb);
     
	            },
	            error: function(data) 
	            {
	            	var error = ('<div class="alert alert-danger">'+'LA ORDEN DE COMPRA NO CORRESPONDE A UN NÚMERO DE MERCADO PUBLICO, '+'</div> ')
	                $("#error").html(error);   
	                     //
	        	}
	    });
});

 </script>
@endsection