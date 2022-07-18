@extends('dashboard')

@section('content')
    <div class="col-12">
        <h1>Add message</h1>
        @foreach($errors->all() as $message)
            <span class="text-danger">{{ $message }}</span>
        @endforeach
        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="col-6">
                <label for="content" class="form-label"></label>
                <textarea id="content" name="content" rows="6" class="form-control" placeholder="Enter content">{{ old('content') }}</textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </form>
    </div>
@endsection
