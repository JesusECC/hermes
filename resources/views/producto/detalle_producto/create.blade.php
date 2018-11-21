@extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Productos</a></li>
            <li class="breadcrumb-item ">Producto Final</li>
            <li class="breadcrumb-item active">Producto Final</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4 class="card-title pull-left">Registrar Producto Final</h4>
        @if (count($errors)>0)
            <div class="alert-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach 
                </ul>   
            </div>
        @endif
    </div>

{!!Form::open(array('url'=>'/detalle_producto','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

    <div class="card-body">
        <h4 class="card-title">Datos del Producto</h4>
        <div class="form-body">
            <div class="row p-t-10">

            	<div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label">Tipo Producto</label>
                        <select name="idTipoProducto" class="form-control selectpicker" id="" data-live-search="true">
                            <option value="" disabled="" selected="">Tipo Producto</option>
                            @foreach($tipoproducto as $tp)                
                            <option value="{{$tp->id}}">{{$tp->nombreTP}}</option>
                            @endforeach  
                        </select>   
                    </div>                    
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="control-label">Nombre Producto</label>
                        <input type="text" name="nombre_producto" class="form-control" placeholder="Ingrese nombre del Producto">
                    </div>                    
                </div>
               

            </div>
            <div class="row">
             <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Codigo Producto</label>
                        <input type="text" id="" class="form-control" placeholder="Ingrese Codigo">
                    </div>                    
                </div>
        
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Marca</label>
                        <input type="text" name="marca_producto" class="form-control" placeholder="Asignar un marca">                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <input type="text" name="categoria" class="form-control" placeholder="Asignar un categoria">                        
                    </div>
                </div>
            
                
            </div>
           
                <div class="col-md-4">
                    <label class="control-label">Descuento</label>
                    <div class="input-group">

                        <span class="input-group-addon">%</span>

                        <input type="text" name="descuento" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Asignar un descuento">                        
                    </div>
                </div>
                
            
        </div>
        <button type="submit" class="btn waves-effect waves-light btn-success pull-right" ><i class="far fa-save"></i>Agregar</button>

    </div>
</div>                            
{!!Form::close()!!}
@endsection