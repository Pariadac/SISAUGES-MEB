<?php $__env->startSection('title', 'Editar Usuario'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="<?php echo e(url('/usuario')); ?>">Usuarios</a>/Editar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <div class="col-md-12">
        <div class="contenedoralertas">
          <div id="alerta" style="display:none" class="" data-estado="0" data-clase="0">
          
            <p><strong></strong>  <span></span></p>

          </div>
        </div>
    </div>

    <div class="validadorformularios">

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php echo Form::open(['url' => 'actualizarUsuario/'.$usuario->id_usuario]); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('nivelUsuario','Nivel Usuario*')); ?>

                <?php echo e(Form::select('nivelUsuario[]',$nivel,$usuarioSeleccionado,['class'=>'form-control selectpicker','multiple'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('cedula','Cedula Usuario*')); ?>

                <?php echo e(Form::text('cedula',\Crypt::decrypt($usuario->cedula),['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombre','Nombre*')); ?>

                <?php echo e(Form::text('nombre',$usuario->nombre,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('apellido','Apellido*')); ?>

                <?php echo e(Form::text('apellido',$usuario->apellido,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('email','Correo Electronico*')); ?>

                <?php echo e(Form::text('email',$usuario->email,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('telefono','Telefono*')); ?>

                <?php echo e(Form::text('telefono',$usuario->telefono,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombreUsuario','Nombre de Acceso*')); ?>

                <?php echo e(Form::text('nombreUsuario',$usuario->username,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('password','Contraseña*')); ?>

                <?php echo e(Form::password('password',['class'=>'form-control camporequerido',
                                            'placeholder'=> 'Introduzca nueva contraseña'])); ?>

            </div>
            <div class="col-md-12 msnrequeridos">
                <p>Todos los campos con (*) son obligatorios</p>
            </div>
                
            </div>
        </div>


        <div class="col-md-offset-5">
            <?php echo e(Form::submit('Enviar',['class'=>'btn btn-success', 'id'=>'singlebutton'])); ?>

        </div>

    <?php echo Form::close(); ?>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')); ?>"></script>
<link href="<?php echo e(asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->appendSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>