@extends('layouts.app')

@section('template_title')
    {{ $invoice->name ?? 'Show Invoice' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Invoice</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $invoice->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Client:</strong>
                            {{ $invoice->id_client }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $invoice->date }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $invoice->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
