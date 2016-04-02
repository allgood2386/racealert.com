@extends('layouts.app')

@section('content')
<h1>All Races</h1>
<div>
    <ul>
        @foreach($races as $race)
            <li><a href="{{ $race->id }}" >{{ $race->name }}</a></li>
        @endforeach
    </ul>
</div>

@endsection