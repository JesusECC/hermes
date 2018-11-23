<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Ingreso_Podructo_Final;
use hermes\Detalle_ingresoPF;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use DB;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{

$trabajador=DB::table('Trabajador as c')
->join('Persona as p','p.id','=','c.idPersona')
->select('c.id as idTra','p.nro_documento','p.nombre','p.apellidos','p.fecha_nacimiento','p.sexo')
 ->where('c.estado_idEstado','=',1)
 ->get();

$almacen=DB::table('Almacen as a')
->select('a.id as idAl','a.nombre_almacen','a.codigo')
->get();

$taller=DB::table('Taller as ta')
->select('ta.id as idTA','ta.nombre_taller','ta.codigoT')
->get();

$talla=DB::table('Tallas as t')
->select('t.id as idTa','t.nom_talla')
->get();

$color=DB::table('Color as t')
->select('t.id as idC','t.nombre_color')
->get();

$tiposalida=DB::table('Tipo_salida as ts')
->select('ts.id as idSa','ts.nombre as nombreS')
->get();

$productos= DB::table('Productos as p')
->join('Producto_Detalle as pd','pd.id','=','p.id')
->select('p.CodigoB_Producto','pd.nombre_producto','pd.marca_producto','pd.categoria','pd.descuento','p.stockP','p.precio_unitario','p.id as idPro','pd.codigo_Prod')
->get();
 
 return view("salida.create",["tiposalida"=>$tiposalida,"taller"=>$taller,"color"=>$color,"talla"=>$talla,"almacen"=>$almacen,"trabajador"=>$trabajador,"productos"=>$productos]);
    
}

public function store(Request $request){
      
      dd($request);
   
        $idSalida=DB::table('Salida_MP')->insertGetId(
            [
            'idTipo_salida'=>1,
            'idTrabajador'=>$request->get('idTrabajador'),          
            'idEstado'=>1,
            'idAlmacen'=>$request->get('pidAlmacen'),
            ]
        );

        $idTaller=$request->get('idTaller');
        $productoSMP=$request->get('productoSMP');
        $codigo_bar=$request->get('codigo_bar');
        $codigoSMP=$request->get('codigoSMP');
        $tallaSMP=$request->get('tallaSMP');
        $colorSMP=$request->get('colorSMP');
        $cantidadSMP=$request->get('cantidadSMP');
        

        $cont=0;

        while ($cont<count($codigo_bar)) {
        
            $Dsalida = new Detalle_Salida_MP();
            $Dsalida->idSalidaMP=$idSalida[$cont];
            $Dsalida->codigoSMP=$codigoSMP[$cont];
            $Dsalida->idTaller=$idTaller[$cont];
            $Dsalida->productoSMP=$productoSMP[$cont];
            $Dsalida->colorSMP=$colorSMP[$cont];
            $Dsalida->tallaSMP=$tallaSMP[$cont];
            $Dsalida->cantidadSMP=$cantidadSMP[$cont];
            $Dsalida->codigo_bar=$codigo_bar[$cont];
            $Dsalida->save();

            $cont=$cont+1;
        } 

        return Redirect::to('/salida');
}

 public function codBarra(Request $request)
    {
        //
        $codBarras=$request->get('codBarras');

        $consulta=DB::table('Productos as p')
        ->join('Tallas as t','t.id','=','p.Tallas_idTallas')
        ->join('Color as c','c.id','=','p.Color_idColor')
        ->join('Producto_Detalle as pd','pd.id','=','p.idDetalle_produto')
        ->where('p.CodigoB_Producto','=',$codBarras)
        ->get();
        if (count($consulta)>0) {
            $op=true;
            return ['consulta' =>$consulta,'veri'=>$op];
        }else{
            $op=false;
            return ['veri'=>$op];
        }
        
    }
}
