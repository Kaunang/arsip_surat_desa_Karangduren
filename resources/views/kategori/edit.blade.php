@extends('layouts.app')

@section('title', 'Kategori Surat >> Edit')

@section('content')
  <h3>Kategori Surat >> Edit</h3>
  <p>
    Ubah data kategori. Jika sudah selesai, jangan lupa untuk<br>
    mengklik tombol "Simpan".
  </p>

  {{-- Form edit --}}
  <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="needs-validation mt-4" novalidate>
    @csrf
    @method('PUT')

    <!-- ID (Auto Increment) - readonly -->
    <div class="row align-items-center mb-3">
      <label class="col-sm-3 col-form-label">ID (Auto Increment)</label>
      <div class="col-sm-3 col-md-2 col-lg-1">
        <input type="number" class="form-control form-control-sm bg-light text-center" value="{{ $kategori->id }}"
          readonly>
      </div>
    </div>

    <!-- Nama Kategori -->
    <div class="row align-items-center mb-3">
      <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Kategori</label>
      <div class="col-sm-4">
        <input id="nama_kategori" name="nama_kategori" type="text" class="form-control"
          placeholder="Contoh: Pemberitahuan" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
        <div class="invalid-feedback">Nama kategori wajib diisi.</div>
        @error('nama_kategori')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <!-- Keterangan -->
    <div class="row align-items-start mb-3">
      <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
      <div class="col-sm-8">
        <textarea id="keterangan" name="keterangan" rows="4" class="form-control" required
          placeholder="Contoh: Kategori ini digunakan untuk surat yang berisi pemberitahuan.">{{ old('keterangan', $kategori->keterangan) }}</textarea>
        <div class="invalid-feedback">Keterangan wajib diisi.</div>
        @error('keterangan')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <!-- Tombol -->
    <div class="row mb-3">
      <div class="col-sm-9 offset-sm-3 d-flex gap-2">
        <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection