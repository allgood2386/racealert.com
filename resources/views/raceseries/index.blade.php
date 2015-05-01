@extends('app')
@section('content')
    <h1>Series</h1>
    @foreach($raceSeries as $rs)
        <div>
            <h2>
                <a href=" {{ action('RaceSeriesController@show', [$rs->id]) }}">{{ $rs->name }} </a>
            </h2>
        </div>
    @endforeach
@endsection