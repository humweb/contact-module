@extends('contact::layout')

@section('content')
    <p>{{ $first_name.' '.$last_name }} has sent you a message.<p>
    <h4>Details:</h4>
    <table>
        <tr>
            <td>Name</td>
            <td>{{ $first_name.' '.$last_name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><a href="mailto:{{ $email }}">{{ $email }}</a></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><a href="phone:{{ $phone }}">{{ $phone }}</a></td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{ $question }}</td>
        </tr>
    </table>
@stop
