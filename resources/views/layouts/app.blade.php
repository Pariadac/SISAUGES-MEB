<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISAUGES-MEB-@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('assets/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url('assets/css/dropzone.min.css') }}" rel="stylesheet">

    <link href="{{url('assets/css/plugins/morris.css') }}" rel="stylesheet">
    <link href="{{url('assets/css/chosen.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->


    <!--Principal Style-->
    <link href="{{url('assets/css/principal-style.css') }}" rel="stylesheet">

    <link href="{{url('assets/css/jquery.datetimepicker.css') }}" rel="stylesheet">
    <script type = "text/javascript" >
        function nobackbutton(){
           window.location.hash="no-back-button";
           window.location.hash="Again-No-back-button" //chrome
           window.onhashchange=function(){window.location.hash="no-back-button";}
          }
    </script>

</head>

<body  onLoad="nobackbutton();" onpageshow="if (event.persisted) nobackbutton();" onUnload="">

    @if (Auth::guest())<div id="wrapper" >@else <div id="wrapper"> @endif

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Principal</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Muestrario</a>
            </div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Usuario</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> @if (Auth::guest()) Usuario @else {{Auth::user()->username }} @endif<b class="caret"></b></a>
                    <ul class="dropdown-menu">


                        @if (Auth::guest())

                            <li>
                                <a href="{{ url('/login') }}">Iniciar Sesion</a>
                            </li>
                            
                        @else

                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Configuraciones</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesion</a>
                            </li>

                        @endif

                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                @if (Auth::guest())<ul class="nav navbar-nav side-nav" id="eltraslado">@else <ul class="nav navbar-nav side-nav" id="eltraslado"> @endif
                    <li class="active">
                        <a href="#" id="ocultar_escr"><i class="fa fa-chevron-left"></i> Ocultar</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-1"><i class="fa fa-fw fa-cubes"></i> Muestras<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="field-1" class="collapse">
                            <li>
                                <a href="{{url('/muestras/crear')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/muestras/lista')}}">LISTAR</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-2"><i class="fa fa-fw fa-folder-open"></i> Actividad<span><i class="fa fa-fw fa-caret-down"></i></span></a>

                        <ul id="field-2" class="collapse">
                            
                            <li>
                                <a href="{{url('/crearActividad')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/actividad')}}">LISTAR</a>
                            </li>


                        </ul>

                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-3"><i class="fa fa-fw fa-suitcase"></i> Instituciones<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        
                        <ul id="field-3" class="collapse">
                            <li>
                                <a href="{{url('/institucion/crear')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/institucion')}}">LISTAR</a>
                            </li>
                        </ul>

                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-dep"><i class="fa fa-fw fa-folder-open"></i> Departamentos<span><i class="fa fa-fw fa-caret-down"></i></span></a>

                        <ul id="field-dep" class="collapse">
                            
                            <li>
                                <a href="{{url('/departamento/crear')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/departamento')}}">LISTAR</a>
                            </li>

                            
                        </ul>

                    </li>

                        
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-4"><i class="fa fa-fw fa-users"></i>Tesistas<span><i class="fa fa-fw fa-caret-down"></i></span></a>
    
                        <ul id="field-4" class="collapse">
                            <li>
                                <a href="{{url('/crearTesista')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/tesista')}}">LISTAR</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-5"><i class="fa fa-fw  fa-coffee"></i>Representantes<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="field-5" class="collapse">
                            <li>
                                <a href="{{url('/crearRepresentante')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/representante')}}">LISTAR</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-6"><i class="fa fa-fw fa-user"></i> Usuarios<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        
                        <ul id="field-6" class="collapse">
                            <li>
                                <a href="{{url('/crearUsuario')}}">AGREGAR</a>
                            </li>
                            <li>
                                <a href="{{url('/usuario')}}">LISTAR</a>
                            </li>
                        </ul>

                    </li>
                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>-->
                    </ul>


                <div class="paralela" id="eltraslado2"></div>

</ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="col-md-12">
                    
                        <div class="cabezera">

                            <img src="{{ url('/') }}/assets/complementos/BANNER1.png">
                            
                        </div>
                    </div>


                    @yield('content')


                </div>

            </div>

        <!-- JavaScripts -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{url('assets/js/jquery.js') }}"></script>
        
		<script src="{{url('assets/js/scripts.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{url('assets/js/bootstrap.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{url('assets/js/plugins/morris/raphael.min.js') }}"></script>
        <script src="{{url('assets/js/plugins/morris/morris.min.js') }}"></script>
        <script src="{{url('assets/js/plugins/morris/morris-data.js') }}"></script>
        <script src="{{url('assets/js/chosen.jquery.min.js') }}"></script>
        <script src="{{url('assets/js/dropzone.min.js') }}"></script>
        <script src="{{url('assets/js/jquery.datetimepicker.full.js') }}"></script>
        
        @stack('scripts')
    </div>
</body>

