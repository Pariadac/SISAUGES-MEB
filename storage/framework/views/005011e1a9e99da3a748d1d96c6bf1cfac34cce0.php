<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SISAUGES-<?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
    <?php if(Auth::check()): ?>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">SISAUGES</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tesistas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(URL::to('crearTesista')); ?>">Agregar Tesistas</a></li>
                            <li><a href="<?php echo e(URL::to('crearClasificacionActividad')); ?>">Agregar Tesistas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(URL::to('crearUsuario')); ?>">Agregar Usuarios</a></li>
                        </ul>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Representante<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(URL::to('crearRepresentante')); ?>">Agregar Representante</a></li>
                        </ul>
                    </li>
                    </li>
                    <li><a href="<?php echo e(URL::to('logout')); ?>"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(asset ('bower_components/jquery/dist/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset ('bower_components/bootstrap/dist/js/bootstrap.js')); ?>"></script>
    <link href="<?php echo e(asset ('bower_components/bootstrap/dist/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <?php echo $__env->yieldContent('scripts'); ?>

</div>
