<?php $__env->startSection('title','Sector involucrado en la Actividad'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <table class="table table-responsive table-bordered">
        <tr>
            <th>N° Actividad</th>
            <th>Descripción Sector Actividad</th>
        </tr>
        <?php foreach($sectorActividad as $sA): ?>
            <tr>
                <td><?php echo e($sA->id_sector_ac); ?></td>
                <td><?php echo e($sA->descripcion_sector); ?></td>
                <td width="60" align="center">
                    <?php echo Html::link('sectorActividad/editar/'.$sA->id_sector_ac, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                </td>
                <td width="60" align="center">
                    <?php echo Form::open(array('url' =>'sectorActividad/eliminar/'.$sA->id_sector_ac, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>