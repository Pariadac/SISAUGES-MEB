@extends('layouts.app')
@section('title','Crear Clasificacion Actividad')
@section('content')

    <?php

        if ($mensaje) {
            echo $mensaje;
        }

    ?>


    <div class="col-md-12">
        {!!Form::open(['url' => '/institucion/buscar', 'class' => 'busqueda-inst'])!!}

            <input class="form-control" type="text" name="busqueda" placeholder="BUSCAR">

            <button id="boton-inst">Enviar</button>


        {!! Form::close() !!}
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


@endsection
