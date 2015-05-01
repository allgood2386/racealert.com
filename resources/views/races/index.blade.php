@extends('app')
@section('content')
    <h1>Races</h1>
    @foreach($races as $race)
        <div>
            <h2>
                <a href=" {{ action('RaceController@show', [$race->id]) }}">{{ $race->name }} </a>
            </h2>
        </div>
    @endforeach
@endsection