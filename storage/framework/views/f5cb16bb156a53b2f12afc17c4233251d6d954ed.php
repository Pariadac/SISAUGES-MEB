<?php $title="crear";?>
<?php $__env->startSection('content'); ?>
    <?php if(Session::has('status')): ?>
        <div class="alert alert-success"><?php echo Session::get('status'); ?></div>
    <?php endif; ?>
    <table class="table table-responsive table-bordered">
        <tr>
            <th>N° Actividad</th>
            <th>Clasificación Actividad</th>
            <th>Sector Relacionado</th>
        </tr>
        <?php foreach($clasificacionActividad as $cA): ?>
            <tr>
                <td><?php echo e($cA->id_clasificacion_actividad); ?></td>
                <td><?php echo e($cA->descripcion_clasificacion); ?></td>
                <td><?php echo e($cA->descripcion_sector); ?></td>

                <td width="60" align="center">
                    <?php echo Html::link('clasificacionActividad/editar/'.$cA->id_clasificacion_actividad, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                </td>
                <td width="60" align="center">
                    <?php echo Form::open(array('url' =>'clasificacionActividad/eliminar/'.$cA->id_clasificacion_actividad, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php echo $clasificacionActividad->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>