<?php $__env->startSection('title', 'Crear Actividad'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividad <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Actividad/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

<div class="validadorformularios">

    <?php if(Session::has('message')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
    <?php else: ?>

            <div class="contenedoralertas">
              <div id="alerta" style="display:none" class="" data-estado="0" data-clase="0">
              
                <p><strong></strong>  <span></span></p>

              </div>
            </div>

    <?php endif; ?>
    <?php echo Form::open(['action' => 'ActividadController@store']); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('nombreActividad','Nombre de la Actividad*')); ?>

                <?php echo e(Form::text('nombreActividad',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('sectorActividad','Sector Involucrado*')); ?>

                <?php echo e(Form::select('sectorActividad',$sectorActividad,'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('statusActividad','Status Actividad*')); ?>

                <?php echo e(Form::select('statusActividad',['No iniciado' => 'No Iniciado',
                                                  'Iniciado'    => 'Iniciado',
                                                  'En progreso' => 'En Progreso',
                                                  'Culminado'   => 'Culminado'],'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

            </div>

            <div class="col-md-6">
                <?php echo e(Form::label('permisoActividad','Permisologia*')); ?>

                <?php echo e(Form::select('permisoActividad',['Publico'    => 'Publico',
                                                   'Privado'    => 'Privado'],'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('representante','Representante Actividad*')); ?>

                <?php echo e(Form::select('representante[]',$representante,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])); ?>

            </div>


            <div class="col-md-12 msnrequeridos">
                <p>Todos los campos con (*) son obligatorios</p>
            </div>
            
        </div>
    </div>


    <div class="col-md-offset-5">
        <?php echo e(Form::submit('Enviar',['class'=>'btn btn-success', 'id'=> "singlebutton"])); ?>

    </div>

    <?php echo Form::close(); ?>


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')); ?>"></script>
    <link href="<?php echo e(asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->appendSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>