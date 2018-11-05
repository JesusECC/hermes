<?php

namespace hermes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use hermes\Tipo_Cliente;
class Tipo_ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tipocliente=DB::table('Tipo_Cliente')->get();
        // dd($rol);
        return view('tipocliente.index',['tipocliente'=>$tipocliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipocliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $tipocliente=new Tipo_Cliente;
        $tipocliente->nombre=$request->get('tipo');
        $tipocliente->save();
        return redirect::to('tipocliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return view("tipocliente.edit",['tipocliente'=>Tipo_Cliente::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $id=$request->get('id'); 
        $tipocliente=Tipo_Cliente::Find($id);
        $tipocliente->nombre=$request->get('tipo'); 
        $tipocliente->update();
        return redirect::to('tipocliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tipocliente=Tipo_Cliente::destroy($id);
        // $rol->estado=0;
        // $rol->update();
        return Redirect::to('tipocliente');
    }
}
