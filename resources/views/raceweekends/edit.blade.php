@extends('app')

@section('content')
    <h1>Edit: {!! $raceWeekend->event_name !!}</h1>
    {!! Form::model($raceWeekend, ['method' => 'PATCH', 'action' => ['RaceWeekendController@update', $raceWeekend->id]]) !!}
    @include('raceweekends._form', ['submitButtonText' => 'Edit RaceWeekend'])
    {!! Form::close() !!}
@stop