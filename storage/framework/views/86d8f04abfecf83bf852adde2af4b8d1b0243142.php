<?php $title='epa'; ?>

<?php $__env->startSection('content'); ?>

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <table class="table table-hover">
        <tr>
            <th>Usuario N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach($usuario as $user): ?>
            <tr>
                <td><?php echo e($user->id_usuario); ?></td>
                <td><?php echo e($user->cedula); ?></td>
                <td><?php echo e($user->nombre); ?></td>
                <td><?php echo e($user->apellido); ?></td>
                <td><?php echo e($user->correo_electronico); ?></td>
                <td><?php echo e($user->nombre_usuario); ?></td>
                <td width="60" align="center">
                    <?php echo Html::link('usuario/editar/'.$user->id_usuario, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                </td>
                <td width="60" align="center">
                    <?php echo Form::open(array('url' =>'usuario/eliminar/'.$user->id_usuario, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>