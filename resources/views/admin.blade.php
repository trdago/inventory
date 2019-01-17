<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <style type="text/css">
  .alert {
  /*!opacity: 0.2;*/
  position: absolute;
  top: 0px; 
  left: *; 
  animation: fade 8s ;
  animation-fill-mode: forwards;
  }


  @keyframes fade {
   0%   { opacity: 0; }
   5%   { opacity: 0.95; }
   95%   { opacity: 0.95; }
  100% { opacity: 0; }
}

  </style>

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/adminLTE/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/adminLTE/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/adminLTE/css/jQuery.dataTables.min.css') }}">

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.5 -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/adminLTE/js/app.min.js') }}"></script>
<!-- modificacion de colores con cambas -->
<script src="{{ asset('dist/adminLTE/js/query.dataTables.min.js')  }}"></script>
<!-- <script src="{{ asset('dist/adminLTE/datapicker/js/bootstrap-datepicker.min.js')  }}"></script> -->
<!-- <script src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script> -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/jquery-confirm.min.js')  }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red-light">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>I</b>nventory</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          </a>
      <div class="title text-center col-md-8">
      @if(session()->has('msg'))
        <div  class="alert {{ session('msg')['class'] }} fade in alert-dismissable " style="margin-top:18px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong><span class="glyphicon {{ session('msg')['icon'] }}"></span></strong>
        {{ session('msg')['msg'] }}
        </div>
      @endif
    </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
               <span class="img-circle glyphicon glyphicon-user" alt="User Image"> </span>
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <span class="img-circle glyphicon glyphicon-user" alt="User Image"> </span>

                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
             
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Mi Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('syslogout') }}" class="btn btn-danger btn-flat"> Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>

    </nav>

  </header>

  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
  @section('sidebar')
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
 
        <div class="pull-left info">
        </div>
      </div>
      <ul class="sidebar-menu">
         <li class="header">
          <span class="glyphicon glyphicon-tasks"> PANEL DE ADMINISTRACION </span> 
          </li>
        <li class="treeview">
          <a  href="{{ route('tipo.addView') }}" title="">
            <i class="glyphicon glyphicon-plus text-primary"></i>  
            <span>Crear Clas. de Producto</span>
          </a>
        </li>
        <li class="treeview">
          <a  href="{{ route('producto.addNuevo') }}" title="">
            <i class="glyphicon glyphicon-plus text-primary"></i>  
            <span>ingresar Producto</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ route('producto.entregaView') }}" title="">
          <span class="glyphicon glyphicon-plus text-primary"></span>  
          Dispensar Producto
          </a>
        </li>

        </ul>
    </section>
    <!-- /.sidebar -->
  @show
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <section >
    @yield('content')
    </section>
    

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.0
    </div>
    <strong><a href="#">CTI.2017</a></strong>.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<!-- ./wrapper -->


</body>
</html>
