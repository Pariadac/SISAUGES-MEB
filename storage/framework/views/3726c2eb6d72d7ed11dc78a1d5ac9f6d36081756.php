<?php $__env->startSection('title', 'Indice de Representante'); ?>
<?php $__env->startSection('content'); ?>


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Representante</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    <table class="table table-responsive">
        <tr>
            <th>Representante N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th class="tablaboton">Acción</th>
        </tr>
        <?php foreach($representante as $rep): ?>
            <tr>
                <td><?php echo e($rep->id_representante); ?></td>
                <td><?php echo e($rep->cedula); ?></td>
                <td><?php echo e($rep->nombre); ?></td>
                <td><?php echo e($rep->apellido); ?></td>
                <td><?php echo e($rep->email); ?></td>
                <td class="misbotones">
                    <?php echo Html::link('representante/editar/'.$rep->id_representante, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>


                    <?php echo Form::open(array('url' =>'representante/eliminar/'.$rep->id_representante, 'method' => 'DELETE')); ?>

                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    <?php echo Form::close(); ?>


                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>