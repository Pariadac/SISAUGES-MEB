<?php $title='crear';?>
<?php $__env->startSection('content'); ?>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php echo Form::open(['action'=>'UserController@store']); ?>

        <div class="panel panel-default">
            <div class="panel-body">
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
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>