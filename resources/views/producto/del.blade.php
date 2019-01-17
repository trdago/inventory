@extends('admin')
@section('content')
<section class="content-header">
  <h1>
    Efemeride
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li class="active">Eliminar</li>
  </ol>
</section>
<div class="content">
<div class="box box-danger">
  <div class="box-header text-right bg-danger">

  </div>
  <div class="box-body">
    <form class="form-horizontal" method="post" action="{{ route('efemeride.del', $efemeride->id ) }}">
      <input type="hidden" name="_method" value="delete">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
     
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="dia">Dia</label>  
        <div class="col-md-4">
        <input name="dia" disabled value="{{ $efemeride->dia }}" class="form-control input-md" type="text">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="contenido">Contenido</label>  
        <div class="col-md-5">
        <input name="contenido" disabled value="{{ $efemeride->contenido }}" class="form-control input-md" type="text">
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
          <button class="btn btn-danger">
            <span class="glyphicon glyphicon-floppy-disk"></span>
             Eliminar
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