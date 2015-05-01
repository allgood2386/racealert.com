@extends('app')

@section('content')
    <h1>Edit: {!! $race->name !!}</h1>
    {!! Form::model($race, ['method' => 'PATCH', 'action' => ['RaceController@update', $race->id]]) !!}
    @include('races._form', ['submitButtonText' => 'Edit Race'])
    {!! Form::close() !!}
@stop