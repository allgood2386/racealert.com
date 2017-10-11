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

<!-- Start Field -->
<div class="form-group col-sm-2">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::datetime('start', null, ['class' => 'form-control', 'placeholder' => \Carbon\Carbon::now()->toDateTimeString()]) !!}
</div>

<!-- TrackConfiguration Field -->
@isset($race->trackConfiguration->id)
    <div class="form-group col-sm-10">
        {!! Form::label('track_configuration_id', 'Track Configuration:') !!}
        {!! Form::select('track_configuration_id', $configurations, $race->trackConfiguration->id, ['class' => 'form-control']) !!}
    </div>
@else
    <div class="form-group col-sm-6">
        {!! Form::label('track_configuration_id', 'Track Configuration:') !!}
        {!! Form::select('track_configuration_id', $configurations, null, ['class' => 'form-control']) !!}
    </div>
@endisset

    <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('races.index') !!}" class="btn btn-default">Cancel</a>
</div>
