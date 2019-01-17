@extends('../admin')
@section('content')
<section class="content-header">
  <h1>
    Productos
    <small>Modulo de productos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="glyphicon glyphicon-list-alt"></i> Home</a></li>
    <li class="active">Productos</li>
  </ol>
</section>
<div class="content">
<div class="box box-primary">
	  
	<!-- </div> -->
    <div class="box-body">
<div class="row-horizon ">
<table class="table tab">
	<thead>
		<tr>
			<th data-original-title="Editar Datos Personales" >ID</th>
			<th>CODIGO</th>
			<th>NOMBRE</th>
			<th>EXISTENCIA</th>
			<th>EA</th>
			<th>ACCION</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tipos as $item)
		<tr>
			<td>{{ $item->id}}</td>
			<td>{{ $item->id}}</td>
			<td>{{ $item->nombre }}</td>
			<td>{{ $item->existencia }}</td>
			<td>{{ $item->ea->nombre }}</td>
			<td>
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle btn-md	 ion-ios-gear" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Gestion <span class="caret"></span></button>
		        <ul class="dropdown-menu dropdown-menu-right">
		          <li><a href="" title="Ver">
		          <span class="text-success ion-android-search"></span> Listar Existencia</a></li>
		          <li><a href="" title="Entregar Producto">
		          <span class="text-success ion-flash"></span> Entregar Producto</a></li>
		          <li><a href="" title="Agregar Producto">
		          <span class="text-success ion-clipboard"></span> Agregar Producto</a></li>
		          <li><a href="" title="Modificar Producto">
		          <span class="text-warning ion-edit"></span> Editar</a></li>
		          <li><a href="#"  title="Eliminar Tipo producto">
		          <span class="text-danger ion-trash-a"></span> Eliminar</a>
		          <!-- </li> -->
		        </ul>
		    </div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>	
</div>	
</div>	
</div>
@endsection