@extends('dashboard')
@section('title')
    Messages
@endsection

@section('content')

    <td><a href="{{ route('admin.create') }}"
           class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Create
            new message</a></td>

    <table class="border-collapse table-auto w-full text-sm">
        <thead>
        <tr>
            <th>user</th>
            <th>content</th>
            <th>time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->user->name }}</td>
                <td>{{ $message->content }}</td>
                <td>{{ $message->created_at->diffForHumans() }}</td>
                @if($message->is_new && $message->user_id == auth()->user()->id)
                    <td><a href="{{ route('admin.destroy', $message) }}"
                           class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Удалить</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $messages->links() }}
@stop
