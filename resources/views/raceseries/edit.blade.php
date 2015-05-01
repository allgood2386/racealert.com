@extends('app')

@section('content')
    <h1>Edit: {!! $raceSeries->event_name !!}</h1>
    {!! Form::model($raceSeries, ['method' => 'PATCH', 'action' => ['RaceSeriesController@update', $raceSeries->id]]) !!}
    @include('raceseries._form', ['submitButtonText' => 'Edit Series'])
    {!! Form::close() !!}
@stop