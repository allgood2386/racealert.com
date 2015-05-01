@extends('app')
@section('content')
    <h1>Create a new Race</h1>
    {!! Form::open(['url' => 'race']) !!}
    @include('races._form', ['submitButtonText' => 'Create Race'])
    {!! Form::close() !!}
@endsection