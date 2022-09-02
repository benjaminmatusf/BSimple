@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Compra</h3>
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

             <!--        <form action="{{ route('compras.store') }}" method="POST">
                        @csrf
                        <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="proveedor_id">proveedor_id</label>
                                   <input type="text" name="proveedor_id" class="form-control">
                                </div>
                            </div>
                      
                     

                            <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                   <div class="form-group">
                                     <label for="user_id">user_id</label>
                                      <input type="text" name="user_id" class="form-control">
                                   </div>
                            </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                     <div class="form-group">
                                        <label for="producto_id">producto_id</label>
                                         <input type="text" name="producto_id" class="form-control">
                                     </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                     <div class="form-group">
                                        <label for="cantidad">cantidad</label>
                                         <input type="number" name="cantidad" class="form-control">
                                   </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">                                                    
                                     <div class="form-group">
                                         <label for="preciototal">preciototal</label>
                                         <input type="number" name="preciototal" class="form-control">
                                       </div>
                                </div>

                                   <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>


-->
{!! Form::open(array('route' => 'compras.store','method'=>'POST')) !!}

        <div class="form-group">
            {{Form::label('Usuario comprador:')}}
            {{auth()->user()->name}}
            {{ Form::text('user_id', auth()->id(), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'style'=>'display:none']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Proveedor') }}
            {{ Form::select('proveedor_id', $proveedores , $compra->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Proveedor de la lista']) }}
            {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>    
     
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('producto_id', $productos , $compra->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Producto de la lista']) }}
            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::number('cantidad', $compra->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad en KG']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio total') }}
            {{ Form::number('preciototal', $compra->preciototal, ['class' => 'form-control' . ($errors->has('preciototal') ? ' is-invalid' : ''), 'placeholder' => 'Precio Total en CLP']) }}
            {!! $errors->first('preciototal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
