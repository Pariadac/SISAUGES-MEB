@extends('layouts.app')

@section('content')

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


                $array=$mostrar;

                $extremo=count($array);
              for ($i=0; $i <$extremo ; $i++) 
              { 


                echo '

            <tr>
                <td>'.$array[$i]->id_institucion.'</td> 
                <td>'.$array[$i]->nombre_institucion.'</td> 
                <td>'.$array[$i]->direccion_institucion.'</td> 
                <td>'.$array[$i]->correo_institucional.'</td> 
                <td>'.$array[$i]->telefono_institucion.'</td> 
                <td>'.$array[$i]->id_representante.'</td>
                <td></td>
                <td><a href="/institucion/editar/'.$array[$i]->id_institucion.' ">Modificar</a></td>
                <td><a href="/institucion/eliminar/'.$array[$i]->id_institucion.' ">Eliminar</a></td>  
            </tr>

            ';
                
              }
            
            ?>


        </tbody>




    </table>


@endsection
