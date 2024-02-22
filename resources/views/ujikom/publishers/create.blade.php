@extends('ujikom.layouts.main')

@section('body')
    {{-- Main Form --}}
    <form action="/ujikom/publishers" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Penerbit</label>
            <input type="text" class="form-control @error('id_penerbit') is-invalid @enderror" name="id_penerbit" 
            value="{{ old('id_penerbit') }}" required 
            @if ($errors->hasAny('nama', 'alamat', 'kota', 'telepon'))
            @else
                autofocus
            @endif
            aria-describedby="id_penerbit_feedback">
            @if($errors->has('id_penerbit'))
                <div class="invalid-feedback" id="id_penerbit_feedback">
                    {{ $errors->first('id_penerbit') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Penerbit</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" 
            value="{{ old('nama') }}" required @error('nama') autofocus @enderror aria-describedby="nama_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" 
            value="{{ old('alamat') }}" required @error('alamat') autofocus @enderror aria-describedby="alamat_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" 
            value="{{ old('kota') }}" required @error('kota') autofocus @enderror aria-describedby="kota_feedback">
        </div>
        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input class="form-control @error('telepon') is-invalid @enderror" type="text" name="telepon" 
            value="{{ old('telepon') }}" @error('telepon') autofocus @enderror aria-describedby="telepon_feedback">
        </div>
        <div class="mb-5 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection