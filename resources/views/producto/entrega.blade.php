@extends('../admin')
@section('content')
<style type="text/css">
  .text-small .form-control{
    font-size: 10px !important;
  }

</style>
<section class="content-header">
  <h1>
    Dispensar Producto
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
    <div id="primary">
        
      <div class="form-group row">
      <label class="col-md-2 control-label">Usuario</label>
      <div class="col-md-10">
        <select id="selectUser" class="form-control">
          <option value="--">..::Seleccionar Usuario::..</option>
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{$user->apellido1.' '.$user->name }}</option>
          @endforeach
        </select>
      </div>
      </div>
      <div class="form-group row">
      <label class="col-md-2 control-label">Motivo</label>
      <div class="col-md-10">
        <input id="usr_motivo" type="text" class="form-control" name="">
      </div>
      </div>
      <div class="form-group row">
      <div class="col-md-10">
          <button id="btnPrimary" class="btn btn-primary">Agregar Productos</button>
      </div>
      </div>
    </div>
    <div id="second" class="hidden">
      
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input id="producto" class="form-control" type="text" name="producto">
    <hr>
    <div class="form-group row">
      <div class="col-md-10">
          <button disabled id="add" class="btn btn-success"> Agregar</button>
          <button disabled id="btnEntrega" class="btn btn-primary"><span id="num" class="badge"></span><span class="glyphicon glyphicon-shopping-cart"></span> Entregar </button>
      </div>
    </div>
    <hr>
    <div class="col-md-12" id="result"></div>
    <div class="col-md-12" id="resConfirm"></div>
      
    </div>
    <div id="tree" class="hidden">
      tercera 
    </div>
    </div>
  </div>
</div>
</div>  
</div>  
</div>
<script type="text/javascript">

var entrega = {user: {id: null, motivo: null}, productos: []};
var pro = null;

function btnAdd()
{
  $('#primary').addClass('hidden');
  $('#tree').addClass('hidden');
  $('#second').removeClass('hidden');
  $('#num').html(entrega.productos.length);

}
function btnConfirm()
{
  var form = {
                _token:$('#token').val(),
                entrega: entrega
          };

  console.log(form);
  var url= getURL();

  $.confirm({
    theme: 'supervan',
    icon: 'glyphicon glyphicon-floppy-disk',
    // title: 'GRABANDO',
    content: function () {
        var self = this;
        return $.ajax({
            url: url+'admin/producto/confirmEntrega',
            data: form,
            success: function(data)
          { 
            console.log(data);
            if(!data.result)
            {
              $('#result').html('no Encontrado');
              return false;
            }

            self.setTitle('SUCCESS');
            self.setContent('');

              
          },
          error: function(data) 
          {
            self.setTitle('ERROR');
            self.setContent('Ocurrio un error');
          }

          });
    },

    buttons: {
        Salir: function () {
            location.reload();
        }
    }
});

  

}

function formatNumber(num) {
    if (!num || num == 'NaN') return '-';
    if (num == 'Infinity') return '&#x221e;';
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
        num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num + ',' + cents);
}

function btnRemove(i)
{
  console.log('btn');
  
  $.confirm({
      title: 'Confirmación',
      content: '¿ Esta seguro ? que quiere elminar el item',
      buttons: {
          si: {
            btnClass: 'btn-red',
            action: function(){
              entrega.productos.splice(i, 1);
              console.log(entrega);
              displayEntrega();
              $.alert('Eliminado de la lista!');
            }
          },
          cancel: {
            btnClass: 'btn-green',
            action: function(){
              return true;
            }
          }
      }
  });
}


    function displayEntrega()
    {
      $("#primary").addClass('hidden');
      $("#second").addClass('hidden');
      $("#tree").removeClass('hidden');

      var ht = '<div class="col-md-12 text-center" >DETALLE <hr> </div>';
    
       ht += '<div class="col-md-12"> <span onclick="javascript:btnAdd()" class="btn btn-success">Agregar producto</span> <span onclick="javascript:btnConfirm()" class="btn btn-primary">Confirmar Entrega</span> <hr></div>';
      
        ht += '<div class="form-group row">';
        
          ht += '<label class="col-md-2 control-label">Solicitante</label>';
          ht += '<div class="col-md-10">';
            ht += '<input class="form-control" type="text" value="'+entrega.user.nombre+'" disabled />';
          ht += '</div>';
        ht += '</div>';


        ht += '<div class="form-group row">';
          ht += '<label class="col-md-2 control-label">Motivo</label>';
          ht += '<div class="col-md-10">';
            ht += '<input class="form-control" type="text" value="'+entrega.user.motivo+'" disabled />';
          ht += '</div>';

        ht += '</div>';
        ht += '<hr>';

        ht += '<div class="form-group row">';
          ht += '<label class="col-md-1 control-label">ID</label>';
          ht += '<label class="col-md-1 control-label">Cantidad</label>';
          ht += '<label class="col-md-1 control-label">U/E</label>';
          ht += '<label class="col-md-6 control-label">Descripcion</label>';
          ht += '<label class="col-md-1 control-label">Precio</label>';
        ht += '</div>';
        var total = 0;

      $.each( entrega.productos, function(index, d)
      {
          
         total+=d.valor_entrego;
          ht += '<div class="form-group row text-small">';

            ht += '<div class="col-md-1">';
              ht += '<input class="form-control" type="text" value="'+d.id+'" disabled />';
            ht += '</div>';

            ht += '<div class="col-md-1">';
              ht += '<input class="form-control" type="text" value="'+d.entrego+'" disabled />';
            ht += '</div>';

            ht += '<div class="col-md-1">';
              ht += '<input class="form-control" type="text" value="'+d.tipo.unidad_entrega.nombre+'" disabled />';
            ht += '</div>';

            ht += '<div class="col-md-6">';
              ht += '<input class="form-control" type="text" value="'+d.descripcion+'" disabled />';
            ht += '</div>';

            ht += '<div class="col-md-2 has-success">';
              ht += '<input class="form-control" type="text" value="'+formatNumber(d.valor_entrego)+'" disabled />';
            ht += '</div>';

            ht += '<div class="col-md-1">';
            ht += '<span onclick="javascript:btnRemove('+index+')" class="btn btn-danger glyphicon glyphicon-remove"></span>';
            ht += '</div>';
          ht += '</div>';
        // console.log('pro: '+pro.id + ' - prod: '+d.id);
        
      });

      entrega['valor_total'] = total;

      ht += '<hr>';
      ht += '<div class="form-group row">';
        ht += '<label class="col-md-9 control-label">TOTAL</label>';
        ht += '<div class="col-md-2 has-success">';
            ht += '<input class="form-control" value="'+formatNumber(total)+'" disabled/>';
            ht += '</div>';
      ht += '</div>';

      $("#tree").html(ht);
    }

  function validateExistencia()
  {
    var ex = false;
    $.each( entrega.productos, function(index, d)
    {
      // console.log('pro: '+pro.id + ' - prod: '+d.id);
      if(d.id == pro.id)
        ex = true;
    });

    return ex;
  }

  function validateBtnEntregar()
  {
    $('#btnEntrega').prop('disabled', true);

    console.log(entrega.productos);
    if(entrega.productos.length >=0 )
       $('#btnEntrega').prop('disabled', false);

  }

$( document ).ready(function() 
{

  $('#btnPrimary').click(function()
  {
    var us = $('#selectUser').val();
    var motivo = $('#usr_motivo').val();
    // console.log(us);
    if(us == '--')
      return $.alert('* Usuario incorecto');

    if(motivo == '')
      return $.alert('* El campo motivo no puede estar en blanco');

    entrega.user.id = us;
    entrega.user.nombre = $('#selectUser option:selected').text();
    entrega.user.motivo = motivo;
      

  console.log(entrega);

    // form.push(user: { id: us,  motivo: motivo});
    // console.log(entrega);
    $('#primary').addClass('hidden');
    $('#tree').addClass('hidden');
    $('#second').removeClass('hidden');
  });



    

    $('#btnEntrega').click(function()
    {
      displayEntrega();

    });

    $('#add').click(function()
    {  

      if(validateExistencia())
        return $.alert('Ya esta ingresado');

      var en = $('#entregando').val();
      if(en == 0 || en > pro.capacidad_disponible  )
        return $.alert('Error en la cantidad a entregar');
      
      // acmtivar el btn entregar
      validateBtnEntregar();

      pro['entrego']=$('#entregando').val();

      if(pro.moneda== 'USD')
        pro['total_valor_peso'] = pro.valor_dolar*pro.precio_mercado_publico;
      else
        pro['total_valor_peso'] = pro.precio_mercado_publico;


      pro['valor_unitario'] = pro.total_valor_peso / pro.capacidad_total;
      pro['valor_entrego']=pro.valor_unitario * pro.entrego;

      entrega.productos.push(pro);
      pro=null;
      $('#num').html(entrega.productos.length);
      $('#result').html('');


      console.log(entrega);


    });

    $('#producto').keydown(function(event)
    {

        if(event.which == 13) 
        {
          $('#add').prop('disabled', true);
          

          pro = { id: $(this).val()};
          // console.log(pro.id);
          if(validateExistencia())
          {
            return $.alert('Ya esta ingresado');
          }
          console.log(validateExistencia());

          var form = {
                _token:$('#token').val(),
                producto: $(this).val()
          };

            // console.log(form);
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
                    validateBtnEntregar();
                    pro = data.producto;
                    // pro['otro']='valor de otro mens :P';
                    $('#result').html(inputs);
                    $('#producto').val('');
                    
                },
                error: function(data) 
                {
                      $('#result').html('NO ENCONTRADO');
                }

                });
        }
    });




    function createInputs(p)
    {

      var ipts  = '';
          
          ipts += '<div class="form-group row">';
            // ipts += '<label class="col-md-1 control-label">ID</label>';
            ipts += '<div class="col-md-2">';
              ipts += '<small>CODIGO PRODUCTO</small>';
              ipts += '<input class="form-control" type="text" value="'+p.id+'" disabled />';
            ipts += '</div>';
            // valido si la unidad de entrega y almacenamiento son la misma

                ipts += '<div class="col-md-10">';
              ipts += '<small>Disponible para entregar en '+p.tipo.unidad_entrega.nombre+'</small>';
                  ipts += '<input id="entregando" type="text" class="form-control" value="'+p.capacidad_disponible+'" />';
                ipts += '</div>';


        
         ipts += '</div>';     
            ipts += '<small>* la capacidad total del '+p.tipo.unidad_almacenamiento.nombre+' es '+p.capacidad_total+'</small>';     
         ipts += '<hr>';      

          ipts += '<div class="form-group row">';
            ipts += '<label class="col-md-2 control-label">Categoria</label>';
            ipts += '<div class="col-md-4">';
              ipts += '<input class="form-control" type="text" value="'+p.tipo.clasificacion.nombre+'" disabled />';
            ipts += '</div>';
            ipts += '<label class="col-md-2 control-label">Tipo</label>';
            ipts += '<div class="col-md-4">';
              ipts += '<input class="form-control" type="text" value="'+p.tipo.nombre+'" disabled />';
            ipts += '</div>';
          ipts += '</div>';

          ipts += '<hr>';

          ipts += '<div class="form-group row">';
            ipts += '<label class="col-md-2 control-label">Fecha Ingreso</label>';
            ipts += '<div class="col-md-4">';
              ipts += '<input class="form-control" type="text" value="'+p.fecha_ingreso+'" disabled />';
            ipts += '</div>';
            ipts += '<label class="col-md-2 control-label">Orden de Compra</label>';
            ipts += '<div class="col-md-4">';
              ipts += '<input class="form-control" type="text" value="'+p.orden_compras_mercado+'" disabled />';
            ipts += '</div>';
          ipts += '</div>';


          ipts += '<div class="form-group row">';
            ipts += '<label  class="col-md-2 control-label">Descripcion</label>';
            ipts += '<div class="col-md-10">';
              ipts += '<input class="form-control" type="text" value="'+p.descripcion+'" disabled />';
            ipts += '</div>';
          ipts += '</div>';

          ipts += '';
          $('#add').prop("disabled", false);
        
          


      return ipts;
    }
    


});

</script>

  @endsection