<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use hermes\Producto_Detalle;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hermes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;

class Producto_DetalleController extends Controller
{
  
    public function index()
    {
       $detalleproducto=DB::table('Producto_Detalle')
       ->where('estado_idEstado','=',1)
       ->get();
       return view("producto.detalle_producto.index",["detalleproducto"=>$detalleproducto]);
    }

    
    public function create()
    {
    $tipoproducto=db::table('Tipo_producto')
    ->get();
    return view("producto.detalle_producto.create",["tipoproducto"=>$tipoproducto]);
    }

    public function store(Request $request)
    {
            $producto=new Producto_Detalle;
            $producto->idTipoProducto=$request->get('idTipoProducto');
            $producto->nombre_producto=$request->get('nombre_producto');
            $producto->codigo_Prod=$request->get('codigo_Prod');
            $producto->marca_producto='Quality Moda';
            $producto->categoria=$request->get('categoria');
            $producto->estado_idEstado=1;
            $producto->save();
            return redirect::to('detalle_producto');
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $detalleproducto=Producto_Detalle::findOrFail($id);
    $detalleproducto->estado_idEstado=2;
    $detalleproducto->update();
    return Redirect::to('detalle_producto');
    }
}
