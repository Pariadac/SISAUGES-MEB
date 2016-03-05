<?php $title ="Agregar Representante" ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <?php echo Form::open(['action' => 'RepresentanteController@store']); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('cedula','Cedula Representante')); ?>

                <?php echo e(Form::text('cedula',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombre','Nombre Representante')); ?>

                <?php echo e(Form::text('nombre',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('apellido','Apellido Representante')); ?>

                <?php echo e(Form::text('apellido',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('email','Correo Electronico Representante')); ?>

                <?php echo e(Form::text('email',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('telefono','Telefono Representante')); ?>

                <?php echo e(Form::text('telefono',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        <?php echo e(Form::submit('Enviar',['class'=>'btn btn-primary'])); ?>

    </div>

    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>