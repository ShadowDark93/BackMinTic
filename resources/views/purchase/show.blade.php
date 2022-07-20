@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? 'Show Purchase' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Purchase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchases.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $purchase->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Provider:</strong>
                            {{ $purchase->id_provider }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $purchase->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
