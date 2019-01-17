<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('img/logoh.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>inventory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            /*background-image:url('http://127.0.0.1:8000/vendor/tcg/voyager/assets/images/bg.jpg');*/
            /*background-image:url('{{ asset('img/bg.JPG') }}');*/
            background-color: #FFFFFF;
        }
        .login-sidebar{
            border-top:5px solid #22A7F0;
        }
        @media (max-width: 767px) {
            .login-sidebar {
                border-top:0px !important;
                border-left:5px solid #22A7F0;
            }
        }
        body.login .form-group-default.focused{
            border-color:#22A7F0;
        }
        .login-button, .bar:before, .bar:after{
            background:#22A7F0;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                        <img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="" alt="Logo Icon">
                        <div class="copy animated fadeIn">
                        <h1>inventory</h1>
                        <p>TRD-ASESORES</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">
            
            <div class="login-container">
                
                <p>Inicio de Sesion</p>

                <form action="{{ route('syslogin') }}" method="post">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group form-group-default" id="runGroup">
                        <label>RUN</label>
                        <div class="controls">
                            <input type="text" name="run" id="run" value="{{ old('run') }}" placeholder="11111111" class="form-control" required="">
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>CONTRASEÑA</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Contraseña" class="form-control" required="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="voyager-refresh"></span> Cargando ...</span>
                        <span class="signin">INICIAR</span>
                    </button>

              </form>

              <div style="clear:both"></div>

              
            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var run = document.querySelector('[name="run"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        console.log('click');
        if (form.checkValidity()) 
        {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } 
        else 
        {
            ev.preventDefault();
        }
    });
    run.focus();
    document.getElementById('runGroup').classList.add("focused");
    
    // Focus events for run and password fields
    run.addEventListener('focusin', function(e){
        document.getElementById('runGroup').classList.add("focused");
    });
    run.addEventListener('focusout', function(e){
       document.getElementById('runGroup').classList.remove("focused");
    });
    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
       document.getElementById('passwordGroup').classList.remove("focused");
    });
</script>

</body></html>