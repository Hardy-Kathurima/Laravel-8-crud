@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="details d-flex justify-content-center">

            <div>
                <div class="card p-4 mt-5">
                    <div class="card-body">
                        <h3><strong>Title: </strong>{{ $book->title }}</h3>
                        <p><strong>Author: </strong>{{ $book->author }}</p>
                        <p><strong>Genre: </strong>{{ $book->genre }}</p>
                        <p><strong>Created at: </strong>{{ $book->created_at }}</p>
                        <span><strong>Published by: </strong>{{ ucfirst($book->user->name) }}</span>

                    </div>
                </div>
                <div class=" mt-3">
                    <a href="/">
                        << Return to all books</a>

                </div>




            </div>


        </div>

    </div>
@endsection
