<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISAUGES-MEB-<?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('assets/css/sb-admin.css')); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo e(url('assets/css/plugins/morris.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('assets/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->


    <!--Principal Style-->
    <link href="<?php echo e(url('assets/css/principal-style.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(url('assets/css/jquery.datetimepicker.css')); ?>" rel="stylesheet">

</head>

<body>

    <?php if(Auth::guest()): ?><div id="wrapper" ><?php else: ?> <div id="wrapper"> <?php endif; ?>

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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Muestrario</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(Auth::guest()): ?> Usuario <?php else: ?> { Auth::user()->name }} <?php endif; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">


                        <?php if(Auth::guest()): ?>

                            <li>
                                <a href="<?php echo e(url('/login')); ?>">Iniciar Sesion</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/register')); ?>">Registrarse</a>
                            </li>
                            
                        <?php else: ?>

                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Configuraciones</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesion</a>
                            </li>

                        <?php endif; ?>

                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <?php if(Auth::guest()): ?><ul class="nav navbar-nav side-nav" id="eltraslado"><?php else: ?> <ul class="nav navbar-nav side-nav" id="eltraslado"> <?php endif; ?>
                    <li class="active">
                        <a href="#" id="ocultar_escr"><i class="fa fa-chevron-left"></i> Ocultar</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-1"><i class="fa fa-fw fa-cubes"></i> Muestras<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="field-1" class="collapse">
                            <li>
                                <a href="<?php echo e(url('/muestras/crear')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/muestras/lista')); ?>">LISTAR</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo e(url('/actividad')); ?>"><i class="fa fa-fw fa-folder-open"></i> Actividad</a>
                    </li>

                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-2"><i class="fa fa-fw fa-folder-open"></i> Atividad<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="field-2" class="collapse">


                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#field-2-1"><i class="fa fa-fw fa-folder-open"></i>Clasificacion<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                                <ul id="field-2-1" class="collapse">
                                    <li>
                                        <a href="<?php echo e(url('/crearClasificacionActividad')); ?>">AGREGAR</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/clasificacionActividad')); ?>">LISTAR</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#field-2-2"><i class="fa fa-fw fa-folder-open"></i>Tipo<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                                <ul id="field-2-2" class="collapse">
                                    <li>
                                        <a href="<?php echo e(url('/crearTipoActividad')); ?>">AGREGAR</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/tipoActividad')); ?>">LISTAR</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:;" data-toggle="collapse" data-target="#field-2-3"><i class="fa fa-fw fa-folder-open"></i>Sector<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                                <ul id="field-2-3" class="collapse">
                                    <li>
                                        <a href="<?php echo e(url('/crearSectorActividad')); ?>">AGREGAR</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/sectorActividad')); ?>">LISTAR</a>
                                    </li>
                                </ul>
                            </li>



                            <li>
                                <a href="<?php echo e(url('/crearActividad')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/actividad')); ?>">LISTAR</a>
                            </li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-3"><i class="fa fa-fw fa-suitcase"></i> Instituciones<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        
                        <ul id="field-3" class="collapse">
                            <li>
                                <a href="<?php echo e(url('/institucion/crear')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/institucion')); ?>">LISTAR</a>
                            </li>
                        </ul>

                    </li>
                        
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-4"><i class="fa fa-fw fa-users"></i>Tesistas<span><i class="fa fa-fw fa-caret-down"></i></span></a>
    
                        <ul id="field-4" class="collapse">
                            <li>
                                <a href="<?php echo e(url('/crearTesista')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/tesista')); ?>">LISTAR</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-5"><i class="fa fa-fw  fa-coffee"></i>Representantes<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        <ul id="field-5" class="collapse">
                            <li>
                                <a href="<?php echo e(url('/crearRepresentante')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/representante')); ?>">LISTAR</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#field-6"><i class="fa fa-fw fa-user"></i> Usuarios<span><i class="fa fa-fw fa-caret-down"></i></span></a>
                        
                        <ul id="field-6" class="collapse">
                            <li>
                                <a href="<?php echo e(url('/crearUsuario')); ?>">AGREGAR</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/usuario')); ?>">LISTAR</a>
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
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-paste"></i>Reportes</a>
                    </li>
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

                            <img src="<?php echo e(url('/')); ?>/assets/complementos/BANNER1.png">
                            
                        </div>
                    </div>


                    <?php echo $__env->yieldContent('content'); ?>


                </div>

            </div>

        <!-- JavaScripts -->
        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo e(url('assets/js/jquery.js')); ?>"></script>
        <script src="<?php echo e(url('assets/js/scripts.js')); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo e(url('assets/js/plugins/morris/raphael.min.js')); ?>"></script>
        <script src="<?php echo e(url('assets/js/plugins/morris/morris.min.js')); ?>"></script>
        <script src="<?php echo e(url('assets/js/plugins/morris/morris-data.js')); ?>"></script>
        <script src="<?php echo e(url('assets/js/draganddropquery.js')); ?>"></script>
        <script src="<?php echo e(url('assets/js/jquery.datetimepicker.full.js')); ?>"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
    </div>
</body>

