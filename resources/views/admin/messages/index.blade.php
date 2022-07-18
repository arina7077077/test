@extends('dashboard')
@section('title')
Messages
@endsection
@section('content_header')
<b>Messages</b> <br>
@endsection

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">user</th>
        <th scope="col">content</th>
      </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->user_id }}</td>
            <td>{{ $message->content }}</td>

        </tr>
    @endforeach
    </table>
    @stop
