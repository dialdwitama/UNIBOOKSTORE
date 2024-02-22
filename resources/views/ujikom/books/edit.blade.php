@extends('ujikom.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/ujikom/books/{{ $book->id_buku }}" method="POST">
        @method('put')
        @csrf
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">ID Buku</label>
            <input type="text" class="form-control @error('id_buku') is-invalid @enderror" name="id_buku" 
            value="{{ old('id_buku', $book->id_buku) }}" required 
            @if ($errors->hasAny('nama', 'kategori', 'harga', 'stok', 'penerbit'))
            @else
                autofocus
            @endif
            aria-describedby="id_buku_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Buku</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" 
            value="{{ old('nama', $book->nama) }}" required @error('nama') autofocus @enderror aria-describedby="nama_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori (only Keilmuan, Bisnis, Novel)</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" 
            @error('kategori') autofocus @enderror aria-describedby="kategori_feedback" value="{{ old('kategori', $book->kategori) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" 
            @error('harga') autofocus @enderror aria-describedby="harga_feedback" value="{{ old('harga', $book->harga) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" 
            @error('stok') autofocus @enderror aria-describedby="stok_feedback" value="{{ old('stok', $book->stok) }}">
        </div>
        <div class="mb-4">
            <label class="form-label">Penerbit</label>
            <select name="penerbit" class="form-select @error('penerbit') is-invalid @enderror" @error('penerbit') autofocus @enderror
            aria-describedby="penerbit_feedback">
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->nama }}" {{ old('penerbit', $book->publisher->nama) == "$publisher->nama" ? 'selected' : '' }}>{{ $publisher->nama }}</option>
                @endforeach
            </select>
            @if($errors->has('penerbit'))
                <div class="invalid-feedback" id="penerbit_feedback">
                    {{ $errors->first('penerbit') }}
                </div>
            @endif
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection