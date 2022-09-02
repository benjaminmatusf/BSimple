@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Proveedores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-proveedor')
                        <a class="btn btn-warning" href="{{ route('proveedors.create') }}">Nuevo</a>
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
                            @foreach ($proveedors as $proveedor)
                            <tr>
                                <td style="display: none;">{{ $proveedor->id }}</td>                                
                                <td>{{ $proveedor->nombreEmpresa }}</td>
                                <td>{{ $proveedor->direccionEmpresa }}</td>
                                <td>{{ $proveedor->rutEmpresa }}</td>
                                <td>{{ $proveedor->nombreContacto }}</td>
                                <td>{{ $proveedor->telefonoContacto }}</td>
                                <td>
                                    <form action="{{ route('proveedors.destroy',$proveedor->id) }}" method="POST">                                        
                                        @can('editar-proveedor')
                                        <a class="btn btn-info" href="{{ route('proveedors.edit',$proveedor->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        
                                        @can('borrar-proveedor')
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
                            {!! $proveedors->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
