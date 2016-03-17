<?php $__env->startSection('title','Institucion'); ?>
<?php $__env->startSection('content'); ?>


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Institución <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php

        if ($mensaje) {
            echo $mensaje;
        }

    ?>


    <div class="col-md-12 formulariosajax">
        <?php echo Form::open(['url' => '/institucion/buscar', 'class' => 'busqueda-inst']); ?>


            <div class="col-md-4">
                <input class="form-control" type="text" name="busqueda" placeholder="BUSCAR">
            </div>

            <button type="button" id="boton-inst" class="btn btn-primary">Buscar</button>


        <?php echo Form::close(); ?>

    </div>


    <table class="table table-responsive" style="margin-top:60px!important">
        <tbody>

            <tr>
                <th>Nombre Institucion</th>
                <th>Direccion institucion</th>
                <th>Correo istitucion</th>
                <th>Telefono Institucion</th>
                <th class="tablaboton">Acción</th>
            </tr>
            <?php foreach($mostrar as $m): ?>
                <tr class="borrables">
                    <td><?php echo e($m->nombre_institucion); ?></td>
                    <td><?php echo e($m->direccion_institucion); ?></td>
                    <td><?php echo e($m->correo_institucional); ?></td>
                    <td><?php echo e($m->telefono_institucion); ?></td>
                    <td>
                        <?php echo Html::link('institucion/editar/'.$m->id_institucion,'Modificar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')); ?>

                        <?php echo Form::open(array('url'=> 'institucion/eliminar/'.$m->id_institucion, 'method'=> 'DELETE')); ?>

                            <a href=".' " name="singlebutton" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</a>
                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>




    </table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>