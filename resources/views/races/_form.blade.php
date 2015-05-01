<div class="form-group">
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
    {!! Form::label('type_list', 'Race Type:') !!}
    {!! Form::input('type_list[]', $types, null, ['id' => 'type', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')

@endsection