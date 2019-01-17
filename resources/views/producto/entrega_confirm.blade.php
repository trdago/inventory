@extends('../admin')
@section('content')
<section class="content-header">
  <h1>
    Dispensar 
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li><a href="{{ url('admin/producto') }}">Productos</a></li>
    <li class="active">Entrega-Producto </li>
  </ol>
</section>
<div class="content">
<div class="box box-primary">
  <div class="box-body">
    <div class="col-md-12">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input id="producto" class="form-control" type="text" name="producto">
    <hr>
    <div class="col-md-12" id="result"></div>
    </div>
  </div>
</div>
</div>  
</div>  
</div>
<script type="text/javascript">
$( document ).ready(function() 
{
    
    function getURL()
    {
      return 'http://localhost/inventory/public/';
    }

    $('#producto').keydown(function(event)
    {
           
        if(event.which == 13) 
        {
            var form = {
                _token:$('#token').val(),
                producto: $(this).val()
            };

            console.log(form);
            $('#result').html('Buscando....');

            var url= getURL();

            $.ajax({
                  url: url+'admin/producto/get',
                  data: form,
                  success: function(data)
                { 
                    console.log(data);
                    if(!data.result)
                    {
                      $('#result').html('no Encontrado');
                      return false;
                    }

                    var inputs = createInputs(data.producto);
                    
                    $('#result').html(inputs);
                    
                    // lista = [];
                    // $.each( items, function(index, d)
                    // {
                        
                    // });  
                },
                error: function(data) 
                {
                      $('#result').html('ocurrio un error');
                }

                });

           function createInputs(p)
           {

              var ipts  = '';
                  
                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Stok en U/A</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.tipo.existencia_unidad_almacenamiento+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>'; 
                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Stok en U/E</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.tipo.existencia_unidad_entrega+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>'; 

                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Categoria</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.tipo.clasificacion.nombre+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';
                  
                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Tipo</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.tipo.nombre+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';
                  ipts += '<hr>';

                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Fecha Ingreso</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.fecha_ingreso+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';
                  
                  ipts += '<div class="form-group row">';
                    ipts += '<label class="col-md-2 control-label">Orden de Compra</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.orden_compras_mercado+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';

                  ipts += '<div class="form-group row">';
                    ipts += '<label  class="col-md-2 control-label">Descripcion</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.descripcion+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';

                  ipts += '<div class="form-group row">';
                    ipts += '<label  class="col-md-2 control-label">Capacidad Todal</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.capacidad_total+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';

                  ipts += '<div class="form-group row">';
                    ipts += '<label  class="col-md-2 control-label">Capacidad Disponible</label>';
                    ipts += '<div class="col-md-10">';
                      ipts += '<input class="form-control" type="text" value="'+p.capacidad_disponible+'" disabled />';
                    ipts += '</div>';
                  ipts += '</div>';

                  ipts += '<div class="form-group row">';
                    ipts += '<div class="col-md-10">';
                      ipts += '<button type="submit" class="btn btn-primary float-rigth">Dispensar</button>';
                    ipts += '</div>';
                  ipts += '</div>';
                  
                  ipts += '';
                  


              return ipts;
           }
        }

        

     

    });
    


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