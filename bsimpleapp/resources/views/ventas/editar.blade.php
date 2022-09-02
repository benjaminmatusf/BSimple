@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Venta</h3>
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


                    <form action="{{ route('ventas.update',$venta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                        
                        <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                 <!--  <label for="user_id">user_id</label> -->
                                   {{ Form::text('user_id', auth()->id(), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'style'=>'display:none']) }}
                                </div>
                                </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="cliente_id">Cliente</label>
                                   {{ Form::select('cliente_id', $clientes , $venta->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Cliente de la lista']) }}
                                </div>
                            </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="producto_id">Producto</label>
                                   {{ Form::select('producto_id', $productos , $venta->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Producto de la lista']) }}
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="cantidad">Cantidad</label>
                                   {{ Form::number('cantidad', $venta->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad en KG']) }}
                                </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                            <div class="form-group">
                                   <label for="preciototal">Precio Total</label>
                                   {{ Form::number('preciototal', $venta->preciototal, ['class' => 'form-control' . ($errors->has('preciototal') ? ' is-invalid' : ''), 'placeholder' => 'Precio Total en CLP']) }}
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
