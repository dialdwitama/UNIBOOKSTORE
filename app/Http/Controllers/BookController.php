<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujikom.books.index', [
        'books' => Book::with('publisher') // Load the publisher relationship
                        ->filter(request('search'))
                        ->get(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ujikom.books.create', [
            'publishers' => Publisher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
        $validated['publisher_id'] = Publisher::where('nama', $validated['penerbit'])->first()->id;

        Book::create($validated);

        return redirect('/ujikom/books')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('ujikom.books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('ujikom.books.edit', [
            'book' => $book,
            'publishers' => Publisher::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        if($validated['id_buku'] != $book->id_buku){
            $validator = Validator::make($validated, [
                'id_buku' => 'required|unique:books'
            ]);

            if($validator->fails()){
                return back()->with('error', 'ID Buku harus unik.');
            }

            $validated = array_merge($validated, $validator->validated());
        }
        if($validated['nama'] != $book->nama){
            $validator = Validator::make($validated, [
                'nama' => 'required|unique:books'
            ]);

            if($validator->fails()){
                return back()->with('error', 'Nama Buku harus unik.');
            }

            $validated = array_merge($validated, $validator->validated());
        }

        $validated['publisher_id'] = Publisher::where('nama', $validated['penerbit'])->first()->id;

        $book->update($validated);

        return redirect('/ujikom/books')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/ujikom/books')->with('success', 'Data berhasil dihapus.');
    }

    public function reports(){
        $books = Book::filter(request('search'))
                        ->where('stok', '<=', 10)
                        ->get();

        return view('ujikom.books.reports', [
            'books' => $books
        ]);
    }
}