<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_people') }}
            {{ Form::text('id_people', $provider->id_people, ['class' => 'form-control' . ($errors->has('id_people') ? ' is-invalid' : ''), 'placeholder' => 'Id People']) }}
            {!! $errors->first('id_people', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uen') }}
            {{ Form::text('uen', $provider->uen, ['class' => 'form-control' . ($errors->has('uen') ? ' is-invalid' : ''), 'placeholder' => 'Uen']) }}
            {!! $errors->first('uen', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>