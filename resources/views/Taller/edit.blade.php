@extends('layouts.admin')
@section('content')
<!-- vista create-->
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
     <h4 class="card-title pull-left">Editar Taller</h4>
     
  </div>
  <div class="card-body">
        <div class="form-body">
            <form action="{{ route('taller-update',$taller->id)}}" method="post" >
              @csrf

                                         <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Codigo</label>
                                                    <input type="text" name="codigoT" id="codigoT" class="form-control" value="{{$teletaller[0]->codigoT}}">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                    <input type="text" id="nombre_taller" name="nombre_taller" class="form-control" value="{{$teletaller[0]->nombre_taller}}">
                                                 </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Telefono</label>
                                                    <input type="text" id="numero" name="numero" class="form-control" value="{{$teletaller[0]->numero}}">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tipo de Telefono</label>
                                                <select  class="form-control selectpicker" id="idTipo_telefono" name="idTipo_telefono" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                @foreach($tipotelefono as $tt)                
                                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                       
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Operador</label>
                                                <select  class="form-control selectpicker" id="idTipooperador" name="idTipooperador" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                @foreach($operador as $op)                
                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>

                                                 <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Direccion</label>
                                                    <input type="text" id="direccionAL" name="direccionAL" class="form-control" value="{{$teletaller[0]->direccionAL}}">
                                                    </div>
                                            </div>                                  
                                                 <div class="row p-t-2">
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Departamento</label>
                                                          
                                                        <select  class="form-control selectpicker" id="departamento" name="departamento" data-live-search="true">
                                                        <option value="" disabled="" selected="">Seleccione</option>
                                                        @foreach($departamento as $depa)                
                                                        <option value="{{$depa->id}}">{{$depa->nombre_departamento}}</option>
                                                        @endforeach  
                                                        </select>   
                                                        </div>
                                                </div>
                                              <div class="col-md-4">
                                                    <div class="form-group">
                                                            <label class="control-label">Provincia</label>                                  
                                                        <select  class="form-control selectpicker" id="provincia" name="provincia" data-live-search="true">
                                                            <option value="" disabled="" selected="">Seleccione</option>
                                                        </select>   
                                                        </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <div class="form-group">
                                                            <label class="control-label">Distrito</label>                                  
                                                        <select  class="form-control selectpicker" id="distrito" name="distrito" data-live-search="true">
                                                            <option value="" disabled="" selected="">Seleccione</option>
                                                        </select>   
                                                        </div>
                                                </div>

                                             <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Estado</label>
                                                        <select class="form-control selectpicker" style="width: 100%" name="estado_idEstado" id="estado_idEstado">
                                                            <option >Seleccione</option>
                                                            @foreach($estado as $est)
                                                                <option value="{{$est->id}}">{{ $est->descripcion}}</option>
                                                            @endforeach
                                                        </select>          
                                                    </div>
                                                </div>

                                            <input type="hidden" name="taid" value="{{$teletaller[
                                            0]->taid}}">

                                            <input type="hidden" name="dired" value="{{$teletaller[
                                            0]->dired}}">
                                       
                                       
                                            <input type="hidden" name="teletaid" value="{{$teletaller[
                                            0]->teletaid}}">
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Actualizar</button>
           </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // $('#departamento').click(function(){
    //         console.log('departamento');
    // });

    // $("#departamento").change(console.log('entre'));

    // $('#departamento').click(function(){
    //         console.log('departamento');
    // });
    // $("#departamento").change(console.log('entre'));
    var selectDepartamento = document.getElementById('departamento');
    selectDepartamento.addEventListener('change',function(){
        var selectedOption = this.options[selectDepartamento.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        provincia(id);
        
    });
    var selectProvincia = document.getElementById('provincia');
    selectProvincia.addEventListener('change',function(){
        var selectedOption = this.options[selectProvincia.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        distrito(id);        
    });
    function provincia(idDepartamento){
        console.log(idDepartamento,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{departamento:idDepartamento}, //datos que se envian a traves de ajax
            url:'departamento', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){
                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var provincia=response.provincia;
                    var va;
                    // console.log(response.provincia,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in provincia){
                        va+='<option value="'+provincia[i]['id']+'">'+provincia[i]['nombre_provincia']+'</option>';                 
                    }
                    $("#provincia").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
    function distrito(idProvincia){
        console.log(idProvincia,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{Provincia:idProvincia}, //datos que se envian a traves de ajax
            url:'distrito', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){
                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var distrito=response.distrito;
                    var va;
                    // console.log(response.distrito,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in distrito){
                        va+='<option value="'+distrito[i]['id']+'">'+distrito[i]['nombre_distrito']+'</option>';      
                    }
                    $("#distrito").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
</script>
@endpush
@endsection