<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\User;
use App\Models\Proveedor;


class CompraController extends Controller
{
    function __construct(){

        $this->middleware('permission:ver-compra|crear-compra|editar-compra|borrar-compra', ['only'=>['index']]);
        $this->middleware('permission:crear-compra', ['only'=>['create','store']]);
        $this->middleware('permission:editar-compra', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-compra', ['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $compras = Compra::paginate(5);
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

      /*  $compra = new Compra();
        $proveedores= Proveedore::pluck('nombreEmpresa','id');
        return view('compras.create', compact('compra','proveedores'));*/
        $compra = new Compra();
        $proveedores = Proveedor::pluck('nombreEmpresa', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('compras.crear', compact('compra','proveedores', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'proveedor_id', 'user_id', 'producto_id', 'cantidad', 'preciototal'
        request()->validate([
            'proveedor_id' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'preciototal' => 'required'
        ]);
        Compra::create($request->all());
        return redirect()->route('compras.index');
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
    public function edit(Compra $compra)
    {
        //
        $proveedores = Proveedor::pluck('nombreEmpresa', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('compras.editar', compact('compra', 'proveedores', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
        request()->validate([
            'proveedor_id' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'preciototal' => 'required'
        ]);
        $compra->update($request->all());
        return redirect()->route('compras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
        $compra->delete();
        return redirect()->route('compras.index');
    }
}
