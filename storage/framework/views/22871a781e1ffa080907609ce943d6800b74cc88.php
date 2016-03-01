<?php $__env->startSection('title', 'Agregar Actividad'); ?>
<?php $__env->startSection('content'); ?>

    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividad <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Actividad</label>
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
            <th>Actividad N°</th>
            <th>Nombre Actividad</th>
            <th>Status Actividad</th>
            <th>Permisos</th>
            <th>Accion</th>
        </tr>
        <?php foreach($actividad as $act): ?>
            <tr>
                <td><?php echo e($act->id_actividad); ?></td>
                <td><?php echo e($act->nombre_actividad); ?></td>
                <td><?php echo e($act->status_actividad); ?></td>
                <td><?php echo e($act->permiso_actividad); ?></td>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>