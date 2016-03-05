<?php $title = "Editar Usuario"?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios/Editar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php echo Form::open(['url' => 'actualizarUsuario/'.$usuario->id_usuario]); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('cedula','Cedula Usuario')); ?>

                <?php echo e(Form::text('cedula',\Crypt::decrypt($usuario->cedula),['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombre','Nombre')); ?>

                <?php echo e(Form::text('nombre',$usuario->nombre,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('apellido','Apellido')); ?>

                <?php echo e(Form::text('apellido',$usuario->apellido,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('email','Correo Electronico')); ?>

                <?php echo e(Form::text('email',$usuario->email,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('telefono','Telefono')); ?>

                <?php echo e(Form::text('telefono',$usuario->telefono,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombreUsuario','Nombre de Acceso')); ?>

                <?php echo e(Form::text('nombreUsuario',$usuario->username,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('password','Contraseña')); ?>

                <?php echo e(Form::text('password','',['class'=>'form-control',
                                            'type'=>'text',
                                            'placeholder'=> 'Introduzca nueva contraseña'])); ?>

            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        <?php echo e(Form::submit('Enviar',['class'=>'btn btn-primary'])); ?>

    </div>

    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>