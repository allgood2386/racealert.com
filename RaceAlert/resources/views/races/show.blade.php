@extends('layouts.app')
@section('title', 'Show Race - $race->id')

@section('menu')
        <li><a href="{{ action('RaceController@index') }}">View All Races</a></li>
        <li><a href="{{ action('RaceController@create') }}">Create a Race</a></li>
        <li><a href="{{ action('RaceController@edit', $race->id) }}">Edit This Race</a></li>
@endsection
@section('content')
    <div>{{$race->raceName}}</div>
    <div>{{$race->raceDescription}}</div>
    <div>{{$race->raceStart}}</div>
    <div>{{$race->raceEnd}}</div>
@endsection