@extends('../admin')
@section('content')
<section class="content-header">
  <h1>
    Ingresar Producto
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li><a href="{{ url('admin/producto') }}">Productos</a></li>
    <li class="active">Nuevo-Producto </li>
  </ol>
</section>
<div class="content">
<div class="box box-primary">
  <div class="box-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('producto.add') }}">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="tipo" value="{{ $tipo->id }}">
            <input type="hidden" id="almacenamiento" value="{{ $tipo->unidad_almacenamiento_id }}">
            <input type="hidden" id="almacenNombre" value="{{ $tipo->unidad_almacenamiento->nombre }}">
            <input type="hidden" id="entregaNombre" value="{{ $tipo->unidad_entrega->nombre }}">
            <input type="hidden" id="entregaNombre" value="{{ $tipo->unidad_entrega->nombre }}">
            {{ csrf_field() }}
         <fieldset>
                <legend>Parametros de ingreso</legend>

            <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                <label for="tipo" class="col-md-4 control-label">tipo</label>

                <div class="col-md-6">
                    <select disabled class="form-control">
                        <option >{{ $tipo->nombre }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group{{ $errors->has('codigo_mercado_publico') ? ' has-error' : '' }}">
                <label for="orden_compras_mercado" class="col-md-4 control-label">orden de compra</label>

                <div class="col-md-6">
                    <input id="orden_compras_mercado" value="3328-5407-CM17" type="text" class="form-control" name="orden_compras_mercado" value="{{ old('orden_compras_mercado') }}" required autofocus>
                    <div class="col-md-12 pull-right">
                    <span id="BuscarOrden" class=" btn btn-primary">
                        Buscar
                    </span>
                    </div>
                        

                    @if ($errors->has('orden_compras_mercado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orden_compras_mercado') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('codigo_mercado_publico'))
                        <span class="help-block">
                            <strong>{{ $errors->first('codigo_mercado_publico') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </fieldset>
            <fieldset>
                <legend>Comprador</legend>
            <div  id="comprador">
                
            </div>
            </fieldset>
            <br>
            <fieldset>
            <legend>Producto</legend>
            <div class="well" id="observacion"></div>
            <div class=" hidden form-group{{ $errors->has('codigo_mercado_publico') ? ' has-error' : '' }}">
                <label for="codigo_mercado_publico" class="col-md-4 control-label">codigo mercado publico</label>

                <div class="col-md-6">
                    <input id="codigo_mercado_publico" type="text" class="form-control" name="codigo_mercado_publico" value="{{ old('codigo_mercado_publico') }}" required autofocus>

                    @if ($errors->has('codigo_mercado_publico'))
                        <span class="help-block">
                            <strong>{{ $errors->first('codigo_mercado_publico') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="hidden form-group{{ $errors->has('moneda') ? 'has-error' : '' }}">
                <label for="moneda" class="col-md-4 control-label">moneda</label>

                <div class="col-md-6">
                    <input id="moneda" type="text" class="form-control" name="moneda" value="{{ old('moneda') }}" />
                </div>
            </div>

            <div class=" hidden ">
                <label for="precio_mercado_publico" class="col-md-4 control-label">precio</label>

                <div class="col-md-6">
                    <input id="precio_mercado_publico" type="text" class="form-control" name="precio_mercado_publico" value="{{ old('precio_mercado_publico') }}" >
                </div>
            </div>
            <div class=" hidden ">
                <label for="codigo_mercado_publico" class="col-md-4 control-label">item list mercado</label>

                <div class="col-md-6">
                    <input id="item_list_mercado" type="text" class="form-control" name="item_list_mercado" value="{{ old('item_list_mercado') }}" required autofocus>
                </div>
            </div>
            <div id="divValorDolar" class="hidden form-group{{ $errors->has('valor_dolar') ? ' has-error' : '' }}">
                <label for="descripcion" class="col-md-4 control-label">Valor del dolar</label>

                <div class="col-md-6">
                    <input id="valor_dolar" type="text" class="form-control" name="valor_dolar" value="{{ old('valor_dolar') }}" required autofocus>
                    @if ($errors->has('valor_dolar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('valor_dolar') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                <label for="descripcion" class="col-md-4 control-label">Producto</label>

                <div class="col-md-6">
                    <input id="descripcion_mercado" type="text" class="hidden form-control" name="descripcion_mercado" value="{{ old('descripcion_mercado') }}" required autofocus>
                    <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="hidden form-group{{ $errors->has('categoria_mercado_publico') ? ' has-error' : '' }}">
                <label for="categoria_mercado_publico" class="col-md-4 control-label">categoria mercado publico</label>

                <div class="col-md-6">
                    <input id="categoria_mercado_publico" type="text" class="form-control" name="categoria_mercado_publico" value="{{ old('categoria_mercado_publico') }}" required autofocus>

                    @if ($errors->has('categoria_mercado_publico'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoria_mercado_publico') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                <label for="cantidad" class="col-md-4 control-label">cantidad</label>

                <div class="col-md-6">
                    <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>

                    @if ($errors->has('cantidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cantidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div id="unidad_de_ingreso" class="form-group{{ $errors->has('unidad_de_ingreso') ? ' has-error' : '' }}">
                <label for="unidad_de_ingreso" class="col-md-4 control-label">unidad de ingreso</label>

                <div class="col-md-6">
                    <select name="unidad_de_ingreso" class="form-control">
                        <option value="--">..:: Seleccione Unidad ::..</option>
                        @foreach($unidades as $unidad)
                        <option value="{{ $unidad->id}}">{{ $unidad->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidad_de_ingreso'))
                        <span class="help-block">
                            <strong>{{ $errors->first('unidad_de_ingreso') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group }}">
                <label for="ingreso_cantidad" id="pregunta1" class="col-md-4 control-label"> </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="ingreso_cantidad">

                    @if ($errors->has('ingreso_cantidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ingreso_cantidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </fieldset>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Registrar
                    </button>
                </div>
            </div>
        </form>
  </div>
</div>
  </div>  
</div>  
</div>
<script type="text/javascript">
$( document ).ready(function() 
{
    

    function tableClear()
    {
        var lista = [];
        if($.fn.DataTable.isDataTable('#items'))
        {
            $('#items').DataTable({
            destroy: true,
            data: lista
            });
        } 
    }

    $('#orden_compras_mercado').keydown(function(event)
    {
           
        if(event.which == 13) 
            getOC();
    });

    $('#BuscarOrden').click(function()
    {
        getOC();

    });

    function getOC()
    {
        tableClear();
        var codigo = $('#orden_compras_mercado').val();
            
        var apiurl = apiUrl(codigo);

        $.ajax({
            url: apiurl,
            type: 'GET',
            success: function(data)
            { 
                $('#modalmercado').modal('show');
                console.log(data);
                var items = data.Listado[0].Items.Listado;
                var comprador = data.Listado[0].Comprador;
                
                console.log(items);

                lista = [];
                $.each( items, function(index, d)
                {
                    lista.push([
                        d.Cantidad,
                        d.Categoria,
                        d.Producto,
                        '<span id="'+index+'" class="ing btn btn-success">Ingresar</span>'
                        ]);
                });

                $('#items').DataTable({
                    destroy: true,
                    data: lista,
                    columns: [
                        {title: "cantidad"},
                        {title: "categoria"},
                        {title: "Producto"},
                        {title: "ACCION"}
                    ],
                    "initComplete": function(){
                        console.log('termino de cargar la tabla');

                    
                    }
                });
                
                $('.ing').click(function()
                {
                    $('#modalmercado').modal('hide');
                    var index = $(this).attr('id');
                    var item = items[index];
                    console.log(item);
                    $('#item_list_mercado').val(index);
                    $('#codigo_mercado_publico').val(item.CodigoProducto);
                    $('#descripcion').val(item.Producto);
                    $('#descripcion_mercado').val(item.Producto);
                    $('#precio_mercado_publico').val(item.Total);
                    console.log(data.Listado[0]);
                    $('#observacion').html(data.Listado[0].Descripcion);
                    // $('#precio_mercado_publico').val(item.Total);
                    $('#moneda').val(item.Moneda);
                    // alert(item.Categoria);
                    $('#categoria_mercado_publico').val(item.Categoria);
                    // console.log('categoria: '+item.categoria);
                    if(item.categoria == '' || item.categoria == null )
                        $('#categoria_mercado_publico').val('Sin categoria');

                    $('#cantidad').val(item.Cantidad);

                    if(item.Moneda == 'USD')
                        $('#divValorDolar').removeClass('hidden');

                    var info= '<div class="form-group"><label for="codigo_mercado_publico" class="col-md-4 control-label">Nombre</label>';
                    info+= '<div class="col-md-6">';
                    info+=' <input class="form-control" disabled value="'+comprador.NombreContacto+'" />   ';
                    info+=' </div></div>';

                    info+= '<div class="form-group"><label for="codigo_mercado_publico" class="col-md-4 control-label">Telefono</label>';
                    info+= '<div class="col-md-6">';
                    info+=' <input class="form-control" disabled value="'+comprador.FonoContacto+'" />   ';
                    info+=' </div></div>';

                    info+= '<div class="form-group"><label for="codigo_mercado_publico" class="col-md-4 control-label">Correo</label>';

                    info+= '<div class="col-md-6">';
                    info+=' <input class="form-control" disabled value="'+comprador.MailContacto+'" />   ';
                    info+=' </div></div>';

                    $('#comprador').html(info);
                    
                });

                
            },
            error: function(data) {
                alert('No se encontraron datos!'); 
            }
        });
    }
    
    $('#unidad_de_ingreso').change(function()
    {
        cargarPregunta();
        
    });

    function cargarPregunta()
    {
        if($('#unidad_de_ingreso').val()!='--')
        {   
            var ingreso = $('#unidad_de_ingreso option:selected').val();
            var almacen = $('#almacenamiento').val();

            var almacenNombre = $('#almacenNombre').val();
            var entregaNombre = $('#entregaNombre').val();


            console.log('ingreso: '+ingreso+' , almacen: '+almacen );
            
            var pregunta1 = "";
            if(ingreso == almacen)
            {

                pregunta1= 'Ingrese cantidad de '+entregaNombre +' por ' + almacenNombre;
            }
            else
            {
                
                pregunta1= 'Ingrese cantidad de '+entregaNombre;
            }
            
            $('#pregunta1').html(pregunta1);
            
        }
    }

});

</script>
  <div class="modal fade" id="modalmercado" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-globe"></span> </h4>
        </div>
        <div class="modal-body">
          <table id="items" class="table">
          </table>
        </div>
        <div class="modal-footer">
          Aqui botones y esas cosas
        </div>
      </div>
    </div>
  </div> 
  @endsection