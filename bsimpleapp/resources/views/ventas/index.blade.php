@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ventas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-venta')
                        <a class="btn btn-warning" href="{{ route('ventas.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Cliente</th>
                                    <th style="color:#fff;">Usuario</th>                                    
                                    <th style="color:#fff;">Producto</th>
                                    <th style="color:#fff;">Cantidad</th>
                                    <th style="color:#fff;">Precio Total</th>
                                    <th style="color:#fff;">Fecha de creación</th>
                                    <th style="color:#fff;">Acciones</th>                                                                        
                              </thead>
                              <tbody>
                            @foreach ($ventas as $venta)
                            <tr>
                                <td style="display: none;">{{ $venta->id }}</td>                                
                                <td>{{ $venta->clientes->nombreEmpresa }}</td>
                                <td>{{ $venta->user->name }}</td>
                                <td>{{ $venta->productos->nombre }}</td>
                                <td>{{ $venta->cantidad }} Kg</td>
                                <td>$ {{ $venta->preciototal }} CLP</td>
                                <td>{{ $venta->created_at }}</td>
                                <td>
                                    <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST">                                        
                                        @can('editar-venta')
                                        <a class="btn btn-info" href="{{ route('ventas.edit',$venta->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        
                                        @can('borrar-venta')
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
                            {!! $ventas->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
