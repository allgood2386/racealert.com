@extends('app')

@section('content')
    <h1>{{ $raceweekend->event_name }}</h1>
    <p>{{ $raceweekend->body }}</p>
    <p>Starts @ <b>{{ $raceweekend->start }}</b> and finishes @ <b>{{ $raceweekend->finish }}</b></p>
    <p>Events:
        <ul>
        @foreach($raceweekend->races as $race)
            <li><a href="{{ action('RaceController@show', $race->id) }}">{{ $race->name }}</a></li>
        @endforeach
        </ul>
    </p>
    <p>Series: <a href="{{ action('RaceSeriesController@show', $raceweekend->raceSeries->id) }}"> {{ $raceweekend->raceSeries->name }}</a> </p>
    <p>Head back to <a href="{{ action('RaceWeekendController@index') }}">Race Weekends</a></p>
    <p><a href="{{ action('RaceWeekendController@edit', [$raceweekend->id]) }}">Edit</a> this RaceWeekend</p>
@endsection