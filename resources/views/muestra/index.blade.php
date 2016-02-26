@extends('layouts.app')

@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina principal</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras/</label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php if ($datos) {
                    ?>

                    <div class="col-md-12" id="principal-suit">
                        <h3>Ultima Muestra Tomada:<small><?php echo $datos[0]->codigo_muestra;?></small></h3>
                        <div class="contenedores row">
                            <div class="col-md-4">
                                <img src="{{url('/storage')}}/{{$datos[0]->ruta_img_muestra}}">
                            </div>
                            <div class="col-md-8">
                                <p>{{$datos[0]->descripcion_muestra}}</p>
                            </div>
                        </div>
                    </div>


                <?php
                }else{

                    ?>

                        <div class="col-md-12" id="principal-suit">
                            <h3>Ultima Muestra Tomada:<small>Ninguna</small></h3>
                            <div class="contenedores row">
                                <div class="col-md-4">
                                    <img src="#">
                                </div>
                                <div class="col-md-8">
                                    <p>Descripcion...</p>
                                </div>
                            </div>
                        </div>

                    <?php

                }

                ?>






@endsection
