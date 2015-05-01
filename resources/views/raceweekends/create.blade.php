@extends('app')
@section('content')
    <h1>Create a new RaceWeekend</h1>
    {!! Form::open(['url' => 'raceweekends']) !!}
    @include('raceweekends._form', ['submitButtonText' => 'Create RaceWeekend'])
    {!! Form::close() !!}
@endsection