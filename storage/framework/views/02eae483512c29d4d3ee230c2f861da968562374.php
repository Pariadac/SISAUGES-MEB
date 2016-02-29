<?php $__env->startSection('title','Crear Clasificacion Actividad'); ?>

<?php $__env->startSection('content'); ?>


    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <?php echo Form::open(['action' => 'ClasificacionActividadController@store']); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('descripcionClasificacion','Descripción de la Clasificacion de la Actividad')); ?>

                <?php echo e(Form::text('descripcionClasificacion',null,['class'=>'form-control','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('sectorActividad','Tipo de Actividad')); ?>

                <?php echo e(Form::select('sectorActividad',$sectorActividad,'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

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
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>