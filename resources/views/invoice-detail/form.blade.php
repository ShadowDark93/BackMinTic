<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_invoice') }}
            {{ Form::text('id_invoice', $invoiceDetail->id_invoice, ['class' => 'form-control' . ($errors->has('id_invoice') ? ' is-invalid' : ''), 'placeholder' => 'Id Invoice']) }}
            {!! $errors->first('id_invoice', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_product') }}
            {{ Form::text('id_product', $invoiceDetail->id_product, ['class' => 'form-control' . ($errors->has('id_product') ? ' is-invalid' : ''), 'placeholder' => 'Id Product']) }}
            {!! $errors->first('id_product', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $invoiceDetail->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $invoiceDetail->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>