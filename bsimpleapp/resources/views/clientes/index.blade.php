@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Clientes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-cliente')
                        <a class="btn btn-warning" href="{{ route('clientes.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre Empresa</th>
                                    <th style="color:#fff;">Direccion Empresa</th>                                    
                                    <th style="color:#fff;">RUT Empresa</th>
                                    <th style="color:#fff;">Nombre Contacto</th>
                                    <th style="color:#fff;">Teléfono Contacto</th>
                                    <th style="color:#fff;">Acciones</th>                                                                        
                              </thead>
                              <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td style="display: none;">{{ $cliente->id }}</td>                                
                                <td>{{ $cliente->nombreEmpresa }}</td>
                                <td>{{ $cliente->direccionEmpresa }}</td>
                                <td>{{ $cliente->rutEmpresa }}</td>
                                <td>{{ $cliente->nombreContacto }}</td>
                                <td>{{ $cliente->telefonoContacto }}</td>
                                <td>
                                    <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">                                        
                                        @can('editar-cliente')
                                        <a class="btn btn-info" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        
                                        @can('borrar-cliente')
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
                            {!! $clientes->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
