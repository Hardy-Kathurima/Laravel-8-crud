@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Add books</h1>

        <form method="post" action="/{{ $book->id }}" class="w-50 mt-5">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="title">Book title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
            </div>
            <span style="color:red">@error('title'){{ $message }} @enderror</span><br>

            <div class="form-group">
                <label for="author">Book Author:</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
            </div>
            <span style="color:red">@error('author'){{ $message }} @enderror</span><br>

            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="{{ $book->genre }}">
            </div>
            <span style="color:red">@error('genre'){{ $message }} @enderror</span><br>

            <div class="form-group">
                <button onclick="closeAlert()" class="btn btn-primary mr-2">Update</button>
                <a class="btn  btn-dark mr-2" href="/">Cancel</a>
                <button form="delete-post" onclick="return confirm('Are you sure you want to delete?');"
                    class="btn btn-danger">Delete</button>
            </div>

        </form>
        <form action="/{{ $book->id }}" method="POST" id="delete-post">
            @csrf
            @method('DELETE')

        </form>
    </div>
@endsection
