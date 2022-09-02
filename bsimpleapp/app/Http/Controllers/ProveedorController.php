<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    function __construct(){

        $this->middleware('permission:ver-proveedor|crear-proveedor|editar-proveedor|borrar-proveedor', ['only'=>['index']]);
        $this->middleware('permission:crear-proveedor', ['only'=>['create','store']]);
        $this->middleware('permission:editar-proveedor', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-proveedor', ['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedors = Proveedor::paginate(5);
        return view('proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedors.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'nombreEmpresa' => 'required',
            'direccionEmpresa' => 'required',
            'rutEmpresa' => 'required',
            'nombreContacto' => 'required',
            'telefonoContacto' => 'required'
        ]);
        Proveedor::create($request->all());
        return redirect()->route('proveedors.index');
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
    public function edit(Proveedor $proveedor)
    {
        //
        return view('proveedors.editar', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
        request()->validate([
            'nombreEmpresa' => 'required',
            'direccionEmpresa' => 'required',
            'rutEmpresa' => 'required',
            'nombreContacto' => 'required',
            'telefonoContacto' => 'required'
        ]);
        $proveedor->update($request->all());
        return redirect()->route('proveedors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }
}
