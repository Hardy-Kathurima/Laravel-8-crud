@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add books</h1>

        <form method="post" action="/create" class="w-50 mt-5">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="title">Book title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                <span style="color:red">@error('title'){{ $message }} @enderror</span><br>
            </div>


            <div class="form-group">
                <label for="author">Book Author:</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
                <span style="color:red">@error('author'){{ $message }} @enderror</span><br>
            </div>


            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control">
                <span style="color:red">@error('genre'){{ $message }} @enderror</span><br>
            </div>


            <div class="form-group">
                <button class="btn  btn-primary">Add book</button>
                <a class="btn btn-secondary ml-3" href="/">Cancel</a>

            </div>

        </form>
    </div>
@endsection
