<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>API-HOSPITAL-MERCADOPUBLICO</title>
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
<script src="{{ asset('js/orden.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/datetime-moment.js') }}"></script>
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-red-light">
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body style="background: #EFF2FB;">
  <div>
<!--  97A92C66-BE35-4791-8EF2-716E3D523DCB  -->
    <div class="content">
    @yield('content')
    </div>


  </div>
<div class="copyright">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <p>2018 - Desarrollo Centro de Tecomunicaiones e Informática  | Utilizando API mercadopublico.cl <a href="http://api.mercadopublico.cl/"> Más Información</a></p>
        </div>
    </div>
</div>
  

</body>
</html>
