@extends('ujikom.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/ujikom/books" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Buku</label>
            <input type="text" class="form-control" name="id_buku" 
            value="{{ old('id_buku') }}" required 
            @if ($errors->hasAny('nama', 'kategori', 'harga', 'stok', 'penerbit'))
            @else
                autofocus
            @endif
            aria-describedby="id_buku_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Buku</label>
            <input type="text" class="form-control" name="nama" 
            value="{{ old('nama') }}" required @error('nama') autofocus @enderror aria-describedby="nama_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori (only Keilmuan, Bisnis, Novel)</label>
            <input type="text" class="form-control" name="kategori" 
            value="{{ old('kategori') }}" required @error('kategori') autofocus @enderror aria-describedby="kategori_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga" 
            value="{{ old('harga') }}"  @error('harga') autofocus @enderror aria-describedby="harga_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input class="form-control" type="text" name="stok" 
            value="{{ old('stok') }}" @error('stok') autofocus @enderror aria-describedby="stok_feedback">
        </div>
        <div class="mb-4">
            <label class="form-label">Penerbit</label>
            <select name="penerbit" class="form-select" @error('penerbit') autofocus @enderror
            aria-describedby="penerbit_feedback">
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->nama }}" {{ old('penerbit') == $publisher->nama ? 'selected' : '' }}>{{ $publisher->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection
