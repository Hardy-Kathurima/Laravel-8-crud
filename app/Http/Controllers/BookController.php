<?php

namespace App\Http\Controllers;


use  App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BookController extends Controller
{

    public function index()
    {
        $search = request()->query('search');
        if (!empty($search)) {
            $books = Book::with('user')->where('title', 'LIKE', "%{$search}%")->paginate(5);
        } else {
            $books = Book::orderBy('id', 'desc')->paginate(5);
        }
        return view('index', ['books' => $books]);
    }

    public function create()
    {
        return view('create');
    }
    public function edit(Book $book)
    {
        return view('edit', ['book' => $book]);
    }

    public function show(Book $book)
    {
        return view('details', ['book' => $book]);
    }

    public  function update(Book $book)
    {
        request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required'
        ]);
        $book->update([
            'user_id' => request('user_id'),
            'title' => request('title'),
            'author' => request('author'),
            'genre' => request('genre')
        ]);
        return redirect('/home')->with('message', 'The book was updated successfully');
    }

    public function store()
    {

        request()->validate([
            'user_id' => 'required',
            'title' => 'required|unique:books',
            'author' => 'required',
            'genre' => 'required'
        ]);


        Book::create([
            'user_id' => request('user_id'),
            'title' => request('title'),
            'author' => request('author'),
            'genre' => request('genre')
        ]);
        return redirect('/home')->with('message', 'Book published successfully');
    }

    public  function destroy(Book  $book)
    {
        $book->delete();
        return redirect('/home')->with('delete', ' The book has been deleted');
    }
}