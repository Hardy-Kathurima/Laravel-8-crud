@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content w-50 mx-auto ">

            <div class="row mt-3 mb-3">
                <div class=" col-4 "> <a class="btn btn-success mb-2 text-center " href="/home"> My books</a>

                </div>
                <div class="col">
                    <form method="GET" action="{{ url('/') }}" class=" form-inline">
                        <input class=" form-control " type="search" name="search" id="search" placeholder="Search a book"
                            value="{{ request()->query('search') }}">
                        <button class="btn btn-primary ml-3 " type="submit">Search</button>
                    </form>
                </div>

            </div>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissable" id="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                </div>
            @endif
            @if (session()->has('delete'))
                <div class="alert alert-danger alert-dismissable ">
                    {{ session()->get('delete') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                </div>

            @endif
            @forelse ($books as $book)



                <h2><a href="{{ $book->id }}"> {{ $book->title }}</a></h2>



                <p>Author: {{ $book->author }}</p>
                <p>Genre: {{ $book->genre }}</p>
                <p>Created at: {{ $book->created_at }}</p>
                <span>Published by : {{ ucfirst($book->user->name) }}</span>
                <hr>
            @empty
                <div class=" text-center mt-5 mb-5 ">
                    <p>No results for <strong>{{ request('search') }}</strong>Found</p>
                    <a href="/"> Go to All books</a>
                </div>


            @endforelse
            <div class="d-flex justify-content-center">
                {!! $books->appends(['search' => request('search')])->links('pagination::bootstrap-4') !!}
            </div>




        </div>

    </div>
@endsection
