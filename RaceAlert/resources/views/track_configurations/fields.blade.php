<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Length Field -->
<div class="form-group col-sm-6">
    {!! Form::label('length', 'Length:') !!}
    {!! Form::text('length', null, ['class' => 'form-control']) !!}
</div>

<!-- Configurations Field -->
@isset($trackConfiguration->track->id)
    <div class="form-group col-sm-6">
        {!! Form::label('track_id', 'Track:') !!}
        {!! Form::select('track_id', $tracks, $trackConfiguration->track->id, ['class' => 'form-control']) !!}
    </div>
@else
    <div class="form-group col-sm-6">
        {!! Form::label('track_id', 'Track:') !!}
        {!! Form::select('track_id', $tracks, null, ['class' => 'form-control']) !!}
    </div>
@endisset

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trackConfigurations.index') !!}" class="btn btn-default">Cancel</a>
</div>
