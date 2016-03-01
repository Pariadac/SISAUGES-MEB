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


    <div class="col-md-4">
        <?php echo Form::open(['url' => '/institucion/buscar', 'class' => 'busqueda-inst']); ?>


            <input class="form-control" type="text" name="busqueda" placeholder="BUSCAR">

            <button type="button" class="btn btn-primary">Buscar</button>


        <?php echo Form::close(); ?>

    </div>


    <table class="table">
        <tbody>

            <tr>
                <th>Id Institucion</th>
                <th>Nombre Institucion</th>
                <th>Direccion institucion</th>
                <th>Correo istitucion</th>
                <th>Telefono Institucion</th>
                <th>Id Representante</th>
            </tr>

              
            
            <?php


            

                $extremo=count($mostrar);
              for ($i=0; $i <$extremo ; $i++) 
              { 


                echo '

            <tr class="borrables">
                <td>'.$mostrar[$i]->id_institucion.'</td> 
                <td>'.$mostrar[$i]->nombre_institucion.'</td> 
                <td>'.$mostrar[$i]->direccion_institucion.'</td> 
                <td>'.$mostrar[$i]->correo_institucional.'</td> 
                <td>'.$mostrar[$i]->telefono_institucion.'</td> 
                <td>'.$mostrar[$i]->id_representante.'</td>
                <td></td>
                <td><a href="/institucion/editar/'.$mostrar[$i]->id_institucion.'">Modificar</a></td>
                <td><a href="/institucion/eliminar/'.$mostrar[$i]->id_institucion.' ">Eliminar</a></td>  
            </tr>

            ';
                
              }
            
            ?>


        </tbody>




    </table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>