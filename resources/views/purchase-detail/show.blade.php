@extends('layouts.app')

@section('template_title')
    {{ $purchaseDetail->name ?? 'Show Purchase Detail' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Purchase Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchase-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Purchese:</strong>
                            {{ $purchaseDetail->id_purchese }}
                        </div>
                        <div class="form-group">
                            <strong>Id Product:</strong>
                            {{ $purchaseDetail->id_product }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $purchaseDetail->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $purchaseDetail->price }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $purchaseDetail->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
