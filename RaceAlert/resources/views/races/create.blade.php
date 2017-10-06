@extends('layouts.app')

@section('title', 'Create a Race')
<h1>Create a Race</h1>

@section('menu')
    <li><a href="{{ action('RaceController@index') }}">View All Races</a></li>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $message)
            <div>{{ $message }}</div>
        @endforeach
    @endif

    {{ Form::model('races', ['route' => 'races.store']) }}
        <div>
        {{ Form::label('raceName', 'Race Name:') }}
        {{ Form::text('raceName', null, ['placeholder' => 'Enter Race Name']) }}
        </div>
        <div>
        {{ Form::label('raceDescription', 'Race Description:') }}
        {{ Form::textarea('raceDescription', null, ['placeholder' => 'Enter Race and Track Description']) }}
        </div>
        <div>
            {{ Form::label('raceStart', 'Race Start Time:') }}
            {{ Form::datetime('raceStart', null, ['placeholder' => \Carbon\Carbon::now()->toDateTimeString()]) }}
        </div>
        <div>
            {{ Form::label('raceEnd', 'Race End Time:') }}
            {{ Form::datetime('raceEnd', null, ['placeholder' => \Carbon\Carbon::now()->toDateTimeString()]) }}
        </div>
        <div>
            {{ Form::submit('Submit Race') }}
        </div>
    {{ Form::close() }}
@endsection