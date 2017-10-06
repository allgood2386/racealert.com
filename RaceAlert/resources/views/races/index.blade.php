@extends('layouts.app')
@section('title', 'Races')
@section('content')
<ul class="nav navbar-nav">
    <li><a href="{{ action('RaceController@create') }}">Create a Race</a>
</ul>
@foreach($races as $race)
    <div><a href="{{ route('races.show', $race->id) }}">{{ $race->raceName }}</a></div>
    <div> {{$race->raceDescription}}</div>
    <div> {{$race->raceStart}}</div>
    <div> {{$race->raceEnd}}</div>
@endforeach
@endsection