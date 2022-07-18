<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@section('title', 'Messages')
        Messages</title>
</head>
<body>

@extends('dashboard')

{{-- <link href="/dist/output.css" rel="stylesheet"> --}}

@section('content')

<td><a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm">Create new message</a></td>
<br>
<br>
<br>


<table class="table-auto border border-slate-700">
    <thead>
      <tr>
        <th scope="col">user</th>
        <th scope="col">content</th>
        <th scope="col">time</th>
      </tr>
    </thead>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->user->name }}</td>
            <td>{{ $message->content }}</td>
            <td>{{ $message->created_at->diffForHumans() }}</td>
            @if($message->user_id == auth()->user()->id && ($message->created_at->diffForHumans() > $message->created_at->subDays(1)->diffForHumans()))
            <td><a href="{{ route('admin.destroy', $message) }}" class="btn btn-outline-warning">Удалить</a></td>
            @endif
        </tr>
        @endforeach
</table>

{{ $messages->links() }}
@stop

</body>
</html>

