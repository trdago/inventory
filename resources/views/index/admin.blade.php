@extends('../admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PANEL DE ADMINISTRACION
        <small>Acceso rapido a los modulos </small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><a href="">ver</a></h3>
              <p>LISTA DE DESEOS</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

            <a  href="#" class="small-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>ver</h3>

              <p>PRODUCTOS</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('producto.list') }}" class="small-box-footer">Ver Más <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Log del sistema</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                @foreach($logs as $log)
                <li>{{ $log->id }} , Time : {{ $log->fecha }} ,  userID : {{ $log->user_id }} {{ $log->tabla }}, Evento: {{ $log->accion }} </li>
                @endforeach
             
              </ul>
            
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
             
            </div>
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
  @endsection