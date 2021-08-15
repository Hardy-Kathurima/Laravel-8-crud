@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" text-center w-50 mx-auto ">
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
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-success mt-3 mb-3 mr-3" href="/create"> + Add a book</a>
                <a class="btn btn-secondary mt-3 mb-3" href="/">Go Back</a>
                <div class="card">
                    <div class="card-body">
                        <span class="mr-3">Name: {{ auth()->user()->name }}</span>
                        <span class="mr-3">Email: {{ auth()->user()->email }}</span>
                        <span class="mr-3">Total books published:{{ $all_published->count() }}</span>

                        @if ($all_published->count() > 0)
                            <h3 class="mt-3 mb-3">My Books</h3>
                        @else
                            <h4 class="text-center mt-5 ">No published books yet</h4>
                        @endif

                        @foreach ($all_published as $publish)

                            <h4><a href="{{ $publish->id }}/edit"> {{ $publish->title }}</a></h4>

                            <p>Author: {{ $publish->author }}</p>
                            <p>Genre: {{ $publish->genre }}</p>
                            <p>Created at: {{ $publish->created_at }}</p>
                            <span>Published by : {{ ucfirst($publish->user->name) }}</span>
                            <hr>

                        @endforeach


                    </div>
                </div>



            </div>
        </div>

    @endsection
