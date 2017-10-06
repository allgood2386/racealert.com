@extends('layouts.app')

@section('title', 'Edit Race')
<h1>Edit {{ $race->raceName }}</h1>

@section('menu')
    <li><a href="{{ route('races.index') }}">View All Races</a></li>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $message)
            <div>{{ $message }}</div>
        @endforeach
    @endif

    {{ Form::model('races', ['route' => ['races.update', $race->id], 'method' => 'put']) }}
    <div>
        {{ Form::label('raceName', 'Race Name:') }}
        {{ Form::text('raceName', $race->raceName, ['placeholder' => 'Enter Race Name']) }}
    </div>
    <div>
        {{ Form::label('raceDescription', 'Race Description:') }}
        {{ Form::textarea('raceDescription', $race->raceDescription, ['placeholder' => 'Enter Race and Track Description']) }}
    </div>
    <div>
        {{ Form::label('raceStart', 'Race Start Time:') }}
        {{ Form::datetime('raceStart', $race->raceStart, ['placeholder' => \Carbon\Carbon::now()->toDateTimeString()]) }}
    </div>
    <div>
        {{ Form::label('raceEnd', 'Race End Time:') }}
        {{ Form::datetime('raceEnd', $race->raceEnd, ['placeholder' => \Carbon\Carbon::now()->toDateTimeString()]) }}
    </div>
    <div>
        {{ Form::submit('Submit Race') }}
    </div>
    {{ Form::close() }}

    {!! Form::open(['method' => 'DELETE', 'route' => ['races.destroy', $race->id]]) !!}
    {!! Form::submit('Delete this race?') !!}
    {!! Form::close() !!}
@endsection
