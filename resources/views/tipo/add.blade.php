@extends('../admin')
@section('content')
<section class="content-header">
  <h1>
    Crear Nueva Clasificacion de Producto
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li><a href="{{ url('admin/producto') }}"> Tipo-producto</a></li>
    <li class="active">Nuevo </li>
  </ol>
</section>
<div class="content" id="app">
<div class="box box-primary">
  <div class="box-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('tipo.add') }}">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="col-md-4 control-label">Nombre</label>

                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('clasificacion') ? ' has-error' : '' }}">
                <label for="clasificacion" class="col-md-4 control-label">Clasificacion del producto</label>

                <div class="col-md-6">
                    <select class="form-control" name="clasificacion" id="clasificacion">
                        <option  value="--">..:: Seleccionar Clasificacion ::..</option>
                        @foreach($clasificaciones as $cla)
                        <option value="{{ $cla->id }}">{{ $cla->nombre }}</option>
                        @endforeach
                    </select>
                    <small>*  Si la Clasificacion que necesita no existe,  sientase en la libertad de agregar la que nececita <a class="btn btn-primary btn-sm">Agregar Clasificacion</a></small>
                    @if ($errors->has('clasificacion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('clasificacion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('unidad_de_almacenamiento') ? ' has-error' : '' }}">
                <label for="unidad_de_almacenamiento" class="col-md-4 control-label">Unidad de Almacenamiento</label>

                <div class="col-md-6">
                    <select class="form-control" name="almacenamiento" id="almacenamiento">
                        <option  value="--">..:: Seleccionar Unidad ::..</option>
                        @foreach($tipos as $ea)
                        <option value="{{ $ea->id }}">{{ $ea->nombre }}</option>
                        @endforeach
                    </select>
                    <small>*  Si la unidad que necesita no existe,  sientase en la libertad de agregar la que nececita <a class="btn btn-primary btn-sm">Agregar unidad de Almacenamiento</a></small>
                    @if ($errors->has('unidad_de_entrega'))
                        <span class="help-block">
                            <strong>{{ $errors->first('unidad_de_entrega') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('unidad_de_entrega') ? ' has-error' : '' }}">
                <label for="unidad_de_entrega" class="col-md-4 control-label">Unidad de Entrega</label>

                <div class="col-md-6">
                    <select class="form-control" name="entrega" id="entrega">
                        <option  value="--">..::Seleccionar Unidad ::..</option>
                        @foreach($tipos as $ea)
                        <option value="{{ $ea->id }}">{{ $ea->nombre }}</option>
                        @endforeach
                    </select>
                    <small>*  Si la unidad que necesita no existe,  sientase en la libertad de agregar la que nececita <a class="btn btn-primary btn-sm">Agregar unidad de entrega</a></small>
                    @if ($errors->has('unidad_de_entrega'))
                        <span class="help-block">
                            <strong>{{ $errors->first('unidad_de_entrega') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Grabar
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
// $( document ).ready(function() 
// {
    

//     $('#almacenamiento').change(function()
//     {
//         cargarPregunta();
        
//     });

//     $('#entrega').change(function()
//     {
//         cargarPregunta();
        
//     });

//     function cargarPregunta()
//     {
//         if($('#almacenamiento').val()!='--' && $('#entrega').val()!= '--')
//         {
//             var pregunta1="Cuant@ "+$('#entrega option:selected').text()+" contiene la "+$('#almacenamiento option:selected').text();
//             $('#pregunta1').html(pregunta1);
            
//         }
//     }

// });
</script>
@endsection