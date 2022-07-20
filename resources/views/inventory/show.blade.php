@extends('layouts.app')

@section('template_title')
    {{ $inventory->name ?? 'Show Inventory' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inventory</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inventories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $inventory->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $inventory->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $inventory->price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
