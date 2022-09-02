@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Compras</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-compra')
                        <a class="btn btn-warning" href="{{ route('compras.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Proveedor</th>
                                    <th style="color:#fff;">Usuario</th>                                    
                                    <th style="color:#fff;">Producto</th>
                                    <th style="color:#fff;">Cantidad</th>
                                    <th style="color:#fff;">Precio total</th>
                                    <th style="color:#fff;">Fecha de creación</th>
                                    <th style="color:#fff;">Acciones</th>                                                                        
                              </thead>
                              <tbody>
                            @foreach ($compras as $compra)
                            <tr>
                                <td style="display: none;">{{ $compra->id }}</td>                                
                                <td>{{ $compra->proveedores->nombreEmpresa }}</td>
                                <td>{{ $compra->user->name }}</td>
                                <td>{{ $compra->productos->nombre }}</td>
                                <td>{{ $compra->cantidad }} Kg</td>
                                <td>$ {{ $compra->preciototal }} CLP</td>
                                <td>{{ $compra->created_at }}</td>
                                <td>
                                    <form action="{{ route('compras.destroy',$compra->id) }}" method="POST">                                        
                                        @can('editar-compra')
                                        <a class="btn btn-info" href="{{ route('compras.edit',$compra->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        
                                        @can('borrar-compra')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $compras->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
