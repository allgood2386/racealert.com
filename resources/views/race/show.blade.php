@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $race->name }}</h1>
        <div>
            <div>Start: {{ $race->start }}</div>
            <div>End: {{ $race->end }}</div>
            <p>{{ $race->description }}</p>
        </div>
    </article>
@endsection
