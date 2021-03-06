@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Configuración</li>
            <li class="breadcrumb-item active">Tipo de Salida Materia Prima</li>
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Listar Tipo de Salida Materia Prima</h4>
     <a href="{{ route('tipo_salida_mp-create') }}"><button type="button" class="btn waves-effect waves-light btn-success pull-right">Agregar</button></a>
  </div>
    <div class="card-body">
        <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo Salida de Materia Prima</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tipo_salida_mp as $tsmp)
                    <tr>
                        <td>{{ $tsmp->id }}</td>
                        <td>{{ $tsmp->nombreMP }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('tipo_salida_mp-edit',$tsmp->id) }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-warning m-r-10"></i> </a>
                            <a href="{{ route('tipo_salida_mp-delete',$tsmp->id) }}" data-toggle="tooltip" data-original-title="Eliminar"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                            <!-- <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-eye text-success"></i> </a> -->
                        </td>                        
                    </tr>    
                @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection