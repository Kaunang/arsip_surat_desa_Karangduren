@extends('layouts.app')

@section('title', 'Arsip Surat >> Lihat')

@section('content')
  <h3 class="ms-5">Arsip Surat >> Lihat</h3>

  <div class="ms-5 mb-3">
    <div><strong>Nomor:</strong> {{ $arsip->nomor_surat }}</div>
    <div><strong>Kategori:</strong> {{ $arsip->kategori->nama_kategori }}</div>
    <div><strong>Judul:</strong> {{ $arsip->judul }}</div>
    <div><strong>Waktu Unggah:</strong> {{ $arsip->created_at }}</div>
  </div>

  <!-- Kotak pratinjau PDF -->
  <div class="ms-5 mb-3 border rounded overflow-auto" style="height: 380px;">
    <iframe src="{{ asset('storage/' . $arsip->file) }}" class="w-100 h-100" title="Pratinjau PDF">
    </iframe>
  </div>

  <!-- Tombol aksi -->
  <div class="ms-5 mb-4 d-flex gap-2">
    <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary">&laquo; Kembali</a>
    <a href="{{ asset(path: 'storage/' . $arsip->file) }}" class="btn btn-warning" download>Unduh</a>
    <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-primary">Edit/Ganti File</a>
  </div>
@endsection