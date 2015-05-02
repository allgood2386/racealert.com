@extends('app')

@section('content')
    <h1>{{ $raceSeries->name }}</h1>
    <p>{{ $raceSeries->body }}</p>
    <p>Starts @ <b>{{ $raceSeries->start }}</b> and finishes @ <b>{{ $raceSeries->finish }}</b></p>
    <p>Head back to <a href="{{ action('RaceWeekendController@index') }}">Race Weekends</a></p>
    <p><a href="{{ action('RaceSeriesController@edit', [$raceSeries->id]) }}">Edit</a> this RaceWeekend</p>
@endsection