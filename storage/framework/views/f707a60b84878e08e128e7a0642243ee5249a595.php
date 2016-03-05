<?php $__env->startSection('title', 'Editar Actividad'); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php echo Form::open(['url' => 'actualizarActividad/'.$actividad->id_actividad]); ?>


    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('nombreActividad','Nombre de la Actividad')); ?>

                <?php echo e(Form::text('nombreActividad',$actividad->nombre_actividad,['class'=>'form-control','type'=>'text'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('sectorActividad','Sector Involucrado')); ?>

                <?php echo e(Form::select('sectorActividad',$sectorActividad,$actividad->id_sector_ac,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('statusActividad','Status Actividad')); ?>

                <?php echo e(Form::select('statusActividad',['No iniciado' => 'No Iniciado',
                                                  'Iniciado'    => 'Iniciado',
                                                  'En progreso' => 'En Progreso',
                                                  'Culminado'   => 'Culminado'],$actividad->status_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('permisoActividad','Permisologia')); ?>

                <?php echo e(Form::select('permisoActividad',['Publico'    => 'Publico',
                                                   'Privado'    => 'Privado'],$actividad->permiso_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

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