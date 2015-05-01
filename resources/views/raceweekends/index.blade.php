@extends('app')

@section('content')
    <h1>Race Weekends</h1>
    @foreach($raceWeekends as $raceWeekend)
        <raceweekend>
            <h2>
                <a href=" {{action('RaceWeekendController@show', [$raceWeekend->id])}}">{{ $raceWeekend->event_name }} </a>
            </h2>
        </raceweekend>
    @endforeach
@endsection