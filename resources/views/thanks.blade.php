@extends('contact::layout')

@section('content')
    <p>Thank you {{ $first_name.' '.$last_name }}</p>
    <p>Your message has been sent.</p>
    <p>Copy of message:<p>
    <blockquote>{{ $question }}</blockquote>
@stop
