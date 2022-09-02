@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Venta</h3>
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

                        {!! Form::open(array('route' => 'ventas.store','method'=>'POST')) !!}

        <div class="form-group">
            {{Form::label('Usuario vendedor:')}}
            {{auth()->user()->name}}
            {{ Form::text('user_id', auth()->id(), ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario', 'style'=>'display:none']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Cliente') }}
            {{ Form::select('cliente_id', $clientes , $venta->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Cliente de la lista']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>    
     
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('producto_id', $productos , $venta->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Producto de la lista']) }}
            {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::number('cantidad', $venta->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad en KG']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio total') }}
            {{ Form::number('preciototal', $venta->preciototal, ['class' => 'form-control' . ($errors->has('preciototal') ? ' is-invalid' : ''), 'placeholder' => 'Precio Total en CLP']) }}
            {!! $errors->first('preciototal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>

                        {!! Form::close() !!}
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
