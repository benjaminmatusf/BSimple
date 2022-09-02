@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Cliente</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('clientes.update',$cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nombreEmpresa">Nombre Empresa</label>
                                   <input type="text" name="nombreEmpresa" class="form-control" value="{{ $cliente->nombreEmpresa }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="direccionEmpresa">Dirección Empresa</label>
                                   <input type="text" name="direccionEmpresa" class="form-control" value="{{ $cliente->direccionEmpresa }}">
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="rutEmpresa">RUT Empresa</label>
                                   <input type="text" name="rutEmpresa" class="form-control" value="{{ $cliente->rutEmpresa }}">
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="nombreContacto">Nombre Contacto</label>
                                   <input type="text" name="nombreContacto" class="form-control" value="{{ $cliente->nombreContacto }}">
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="telefonoContacto">Teléfono Contacto</label>
                                   <input type="text" name="telefonoContacto" class="form-control" value="{{ $cliente->telefonoContacto }}">
                                </div>
                                </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
