<?php $__env->startSection('title','Agregar Representante'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

<div class="validadorformularios">
    <?php if(Session::has('message')): ?>

            <div class="contenedoralertas">
              <div id="alerta" style="display:none" class="" data-estado="<?php echo e(Session::get('message')); ?>" data-clase="0">
              
                <p><strong></strong>  <span></span></p>

              </div>
            </div>

    <?php else: ?>


        <div class="contenedoralertas">
          <div id="alerta" style="display:none" class="" data-estado="0" data-clase="0">
          
            <p><strong></strong>  <span></span></p>

          </div>
        </div>


    <?php endif; ?>
    <?php echo Form::open(['action' => 'RepresentanteController@store']); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                <?php echo e(Form::label('cedula','Cedula Representante *')); ?>

                <?php echo e(Form::text('cedula',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('nombre','Nombre Representante *')); ?>

                <?php echo e(Form::text('nombre',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('apellido','Apellido Representante *')); ?>

                <?php echo e(Form::text('apellido',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('email','Correo Electronico Representante *')); ?>

                <?php echo e(Form::text('email',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('telefono','Telefono Representante *')); ?>

                <?php echo e(Form::text('telefono',null,['class'=>'form-control camporequerido','type'=>'text'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('institucion','Institución *')); ?>

                <?php echo e(Form::select('institucion[]',$institucion,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])); ?>

            </div>
            <div class="col-md-6">
                <?php echo e(Form::label('departamento','Departamento *')); ?>

                <?php echo e(Form::select('departamento[]',$departamento,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])); ?>

            </div>


            <div class="col-md-12 msnrequeridos">
                <p>Todos los campos con (*) son obligatorios</p>
            </div>

        </div>
    </div>


    <div class="col-md-offset-5">
        <?php echo e(Form::submit('Enviar',['class'=>'btn btn-success', 'id'=>"singlebutton"])); ?>

    </div>

    <?php echo Form::close(); ?>



</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')); ?>"></script>
    <link href="<?php echo e(asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->appendSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>