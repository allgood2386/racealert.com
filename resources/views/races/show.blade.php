@extends('app')

@section('content')
    <h1>{{ $race->name }}</h1>
    <p>{{ $race->body }}</p>
    <p>Starts @ <b>{{ $race->start }}</b> and finishes @ <b>{{ $race->finish }}</b></p>
    <p>Head back to <a href="{{ action('RaceController@index') }}">Races</a></p>
    <p><a href="{{ action('RaceController@edit', [$race->id]) }}">Edit</a> this Race</p>
@endsection