@extends('contact::layout')

@section('title')
    Thank you {{ $first_name.' '.$last_name }}
@endsection

@section('content')
<p>Thank you {{ $first_name.' '.$last_name }}</p>
<p>Your message has been sent, and you may be contacted shortly if required.</p>
<p>Your message:<p>
<blockquote>{!! $message !!}</blockquote>
@stop
