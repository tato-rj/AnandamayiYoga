<?php

namespace App\Http\Controllers\Reads;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('pages/reads/books/index', compact('books'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $books = Book::paginate(11);
        return view('admin/pages/reads/books/index', compact(['books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'description' => 'required',
            'lang' => 'required',
            'image' => 'required|image'
        ]);

        $book = Book::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'lang' => $request->lang,
            'image_path' => imageToS3($request, 'books'),
            'amazon_url' => $request->amazon_url
        ]);

        return back()->with('status', "The book {$book->title} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin/pages/reads/books/edit/index', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            $request->key => $request->value
        ]);

        if ($request->ajax())
            return 'The book has been successfully edited';
    }

    public function updateImage(Request $request, Book $book)
    {
        $newImage = imageToS3($request, 'books');

        if ($newImage) {
            $book->deleteImage();

            $book->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image has been successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('status', 'The book has been deleted.');
    }
}
