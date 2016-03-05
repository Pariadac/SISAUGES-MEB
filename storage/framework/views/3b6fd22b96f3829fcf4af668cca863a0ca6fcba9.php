<?php $title='crear';?>
<?php $__env->startSection('content'); ?>


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php echo Form::open(['action'=>'UserController@store']); ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    <?php echo e(Form::label('nivel_usuario','Nivel Usuario')); ?>

                    <?php echo e(Form::select('nivel_usuario[]',$nivel,'',['class'=>'form-control selectpicker','multiple'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('cedula','Cedula Usuario')); ?>

                    <?php echo e(Form::text('cedula',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('nombre','Nombre Usuario')); ?>

                    <?php echo e(Form::text('nombre',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('apellido','Apellido Usuario')); ?>

                    <?php echo e(Form::text('apellido',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('email','Correo Electronico Usuario')); ?>

                    <?php echo e(Form::text('email',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('telefono','Telefono Usuario')); ?>

                    <?php echo e(Form::text('telefono',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('nombreUsuario','Nombre Usuario')); ?>

                    <?php echo e(Form::text('nombreUsuario',null,['class'=>'form-control','type'=>'text'])); ?>

                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('contraseña','Contraseña')); ?>

                    <?php echo e(Form::text('contraseña',null,['class'=>'form-control','type'=>'password'])); ?>

                </div>
            </div>
        </div>


        <div class="col-md-offset-5">
            <?php echo e(Form::submit('Enviar',['class'=>'btn btn-primary'])); ?>

        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')); ?>"></script>
<link href="<?php echo e(asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->appendSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>