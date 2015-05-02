<div class="form-group">
    {!! Form::label('event_name','Event Name:') !!}
    {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body','Content:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('start','Start Time:') !!}
    {!! Form::input('date', 'start', date('Y-m-d H:i'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('finish','End Time:') !!}
    {!! Form::input('date', 'finish', date('Y-m-d H:i'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('race_series_id', 'Race Series:') !!}
    {!! Form::select('race_series_id', $raceSeries, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')

@endsection