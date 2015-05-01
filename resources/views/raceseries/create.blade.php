@extends('app')
@section('content')
    <h1>Create a new Series</h1>
    {!! Form::open(['url' => 'raceseries']) !!}
    @include('raceseries._form', ['submitButtonText' => 'Create Series'])
    {!! Form::close() !!}
@endsection