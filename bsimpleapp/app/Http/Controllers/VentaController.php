<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Cliente;

class VentaController extends Controller
{
    function __construct(){

        $this->middleware('permission:ver-venta|crear-venta|editar-venta|borrar-venta', ['only'=>['index']]);
        $this->middleware('permission:crear-venta', ['only'=>['create','store']]);
        $this->middleware('permission:editar-venta', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-venta', ['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas = Venta::paginate(5);
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $venta = new Venta();
        $clientes = Cliente::pluck('nombreEmpresa', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('ventas.crear', compact('venta', 'clientes', 'productos'));
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
            'cliente_id' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'preciototal' => 'required'
        ]);
        Venta::create($request->all());
        return redirect()->route('ventas.index');
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
    public function edit(Venta $venta)
    {
        //
        $clientes = Cliente::pluck('nombreEmpresa', 'id');
        $productos = Producto::pluck('nombre', 'id');
        return view('ventas.editar', compact('venta', 'clientes', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
        request()->validate([
            'cliente_id' => 'required',
            'user_id' => 'required',
            'producto_id' => 'required',
            'cantidad' => 'required',
            'preciototal' => 'required'
        ]);
        $venta->update($request->all());
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
