<?php $title="index";?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <table class="table table-hover">
        <tr>
            <th>Representante N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach($actividad as $act): ?>
            <tr>
                <td><?php echo e($act->id_actividad); ?></td>
                <td><?php echo e($act->nombre_actividad); ?></td>
                <td><?php echo e($act->status_actividad); ?></td>
                <td><?php echo e($act->permisos_actividad); ?></td>
                <td width="60" align="center">
                    <?php echo Html::link('actividad/editar/'.$act->id_actividad, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                </td>
                <td width="60" align="center">
                    <?php echo Form::open(array('url' =>'actividad/eliminar/'.$act->id_actividad, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>