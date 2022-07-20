@extends('layouts.app')

@section('template_title')
    {{ $invoiceDetail->name ?? 'Show Invoice Detail' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Invoice Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('invoice-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Invoice:</strong>
                            {{ $invoiceDetail->id_invoice }}
                        </div>
                        <div class="form-group">
                            <strong>Id Product:</strong>
                            {{ $invoiceDetail->id_product }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $invoiceDetail->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $invoiceDetail->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
