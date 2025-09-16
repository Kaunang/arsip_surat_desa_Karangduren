@extends('layouts.app')

@section('title', 'Arsip Surat >> Edit')

@section('content')
    <h3>Arsip Surat >> Edit</h3>
    <p>
        Perbarui data arsip pada form ini. <br>
        Catatan:
        <br>- File arsip menggunakan format PDF
        <br>- Kosongkan input file jika tidak ingin mengganti file
    </p>

    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data"
        class="needs-validation mt-4" novalidate>
        @csrf
        @method('PUT')

        <!-- Nomor Surat -->
        <div class="row align-items-center mb-3">
            <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-3">
                <input type="text" id="nomor_surat" name="nomor_surat" class="form-control"
                    value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
                <div class="invalid-feedback">Nomor surat wajib diisi.</div>
                @error('nomor_surat') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Kategori -->
        <div class="row align-items-center mb-3">
            <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-4 col-md-4">
                <select id="kategori_id" name="kategori_id" class="form-select" required>
                    <option value="" disabled {{ old('kategori_id', $arsip->kategori_id) ? '' : 'selected' }}>Pilih...
                    </option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" @selected(old('kategori_id', $arsip->kategori_id) == $kat->id)>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Pilih kategori.</div>
                @error('kategori_id') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Judul -->
        <div class="row align-items-center mb-3">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-9">
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $arsip->judul) }}"
                    required>
                <div class="invalid-feedback">Judul wajib diisi.</div>
                @error('judul') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- File Surat (PDF) -->
        <div class="row align-items-center mb-3">
            <label for="file" class="col-sm-2 col-form-label">File Surat (PDF)</label>
            <div class="col-sm-5">
                @if($arsip->file)
                    <div class="mb-2">
                        <span class="form-text d-block mb-1">File saat ini:</span>
                        <a href="{{ asset('storage/' . $arsip->file) }}" target="_blank" class="link-primary">Lihat / Unduh File
                            Lama</a>
                    </div>
                @endif

                <div class="input-group">
                    <input type="file" id="file" name="file" class="form-control" accept="application/pdf">
                    <div class="invalid-feedback">Unggah file PDF.</div>
                </div>
                <div class="form-text">Biarkan kosong jika tidak ingin mengganti file. Hanya menerima file .pdf</div>
                @error('file') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>
        </div>

        <!-- Tombol -->
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2 d-flex gap-2">
                <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary">&laquo; Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection