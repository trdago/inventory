@extends('admin')
@section('content')
<section class="content-header">
  <h1>
    Editar poe: 
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li><a href="{{ url('admin/poe') }}"> Poe </a></li>
    <li class="active">Editar</li>
  </ol>
</section>
<div class="content">
<div class="box box-warning">
  <div class="box-header text-right bg-warning">

  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post" action="{{ route('poe.edit', $poe->id) }}">
      <input type="hidden" name="_method" value="put">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <!-- Text input-->
      <div class="form-group {{ $errors->has('clinica') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="rut">Clinica</label>  
        <div class="col-md-4">
        <select name="clinica" class="form-control select">
        <option selected value="{{ $clinica->clinica_id }}">{{ $clinica->clinica->cnombre }}</option>
          @foreach($clinicas as $item)
            @if($item->clinica->id != $clinica->clinica_id)
              <option value="{{ $item->clinica->id }}">{{ $item->clinica->cnombre }}</option>
            @endif

          @endforeach
        </select>
          @if ($errors->has('clinica'))
            <span class="help-block">
                <strong>{{ $errors->first('clinica') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->has('rut') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="rut">Rut</label>  
        <div class="col-md-4">
        <input value="{{ $poe->rut }}" name="rut" placeholder="rut" class="form-control input-md" type="text">
          @if ($errors->has('rut'))
            <span class="help-block">
                <strong>{{ $errors->first('rut') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="name">Nombre</label>  
        <div class="col-md-4">
        <input value="{{ $poe->name }}" name="name" placeholder="name" class="form-control input-md" type="text">
          @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="email">Correo</label>  
        <div class="col-md-4">
        <input value="{{ $poe->email }}" name="email" placeholder="Correo" class="form-control input-md" type="email">
          @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="phone">Telefono</label>  
        <div class="col-md-4">
        <input value="{{ $poe->phone }}" name="phone" placeholder="Telefono" class="form-control input-md" type="phone">
          @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" for="password">Contraseña</label>  
        <div class="col-md-4">
        <input value="" name="password" placeholder="La contraseña no se cambiara" class="form-control input-md" type="password">
          @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
          <button class="btn btn-warning">
            <span class="glyphicon glyphicon-floppy-disk"></span>
             Actualizar
          </button>
        </div>
      </div>

</form>

  </div>
</div>
  </div>  
</div>  
</div>
@endsection