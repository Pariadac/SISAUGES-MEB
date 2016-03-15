<?php $__env->startSection('title','Indice Tesistas'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tesista <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Tesista</label>
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
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Actividad Relacionada</th>
            <th class="tablaboton">Acción</th>
        </tr>
        <?php foreach($tesista as $tes): ?>
            <tr>
                <td><?php echo e($tes->cedula); ?></td>
                <td><?php echo e($tes->nombre); ?></td>
                <td><?php echo e($tes->apellido); ?></td>
                <td><?php echo e($tes->email); ?></td>
                <td><?php echo e($tes->actividad->nombre_actividad); ?></td>
                <td class="misbotones">
                    <?php echo Html::link('tesista/editar/'.$tes->id_tesista, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>


                    <?php echo Form::open(array('url' =>'tesista/eliminar/'.$tes->id_tesista, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>