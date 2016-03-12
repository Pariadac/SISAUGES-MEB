<?php $__env->startSection('title','Indice de Usuarios'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-responsive">
        <tr>
            <th>Usuario N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Nombre de Usuario</th>
            <th class="tablaboton">Acción</th>
        </tr>
        <?php foreach($usuario as $user): ?>
            <tr>
                <td><?php echo e($user->id_usuario); ?></td>
                <td><?php echo e(\Crypt::decrypt($user->cedula)); ?></td>
                <td><?php echo e($user->nombre); ?></td>
                <td><?php echo e($user->apellido); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->username); ?></td>
                <td class="misbotones">
                    <?php echo Html::link('usuario/editar/'.$user->id_usuario, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                    
                    <?php echo Form::open(array('url' =>'usuario/eliminar/'.$user->id_usuario, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>