@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Compra</h3>
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
                       
                    <form action="{{ route('compras.update',$compra->id) }}" method="POST"> 
                        @csrf
                        @method('PUT')
                      <div class="row">

                              <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                  <div class="form-group">
                                    {{ Form::text('user_id', auth()->id(), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'style'=>'display:none']) }}
                                  </div>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                    <label for="proveedor_id">Proveedor</label>
                                   <!-- <input type="text" name="proveedor_id" class="form-control" value="{{ $compra->proveedores->nombreEmpresa }}"> -->
                                    {{ Form::select('proveedor_id', $proveedores , $compra->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Proveedor de la lista']) }}
                                  </div>
                              </div>                        

                              <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                 <div class="form-group">
                                   <label for="producto_id">Producto</label>
                                   {{ Form::select('producto_id', $productos , $compra->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Producto de la lista']) }}
                              <!--     <input type="text" name="producto_id" class="form-control" value="{{ $compra->productos->nombre }}"> -->
                                </div>
                              </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                   <div class="form-group">
                                      <label for="cantidad">Cantidad</label>
                                      <input type="number" name="cantidad" class="form-control" value="{{ $compra->cantidad }}">
                                   </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                   <div class="form-group">
                                       <label for="preciototal">Precio total</label>
                                       <input type="number" name="preciototal" class="form-control" value="{{ $compra->preciototal }}">
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
