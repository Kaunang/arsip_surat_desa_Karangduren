@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
    <style>
        .fade-alert {
            transition: opacity 0.5s ease;
        }
    </style>

    <h3 class="ms-5">Kategori Surat</h3>
    <p class="ms-5">
        Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
        Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
    </p>

    <!-- Pencarian -->
    <form class="row g-2 align-items-center mb-3 mt-4" role="search" method="GET" action="{{ route('kategori.index') }}">
        <div class="col-auto">
            <label for="searchKategori" class="col-form-label fw-semibold me-3">Cari kategori:</label>
        </div>
        <div class="col-md-6 col-sm-8">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                <input id="searchKategori" name="q" class="form-control" type="search" placeholder="search"
                    value="{{ $q ?? '' }}">
                @if(!empty($q))
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary">✕</a>
                @endif
            </div>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary" type="submit">Cari!</button>
        </div>
    </form>


    {{-- Pesan sukses bila ada --}}
    @if(session('ok'))
        <div id="alertSukses" class="alert alert-success fade-alert" role="alert">
            {{ session('ok') }}
        </div>
    @endif

    <!-- Tabel -->
    <div class="me-3">
        <table id="tblKategori" class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th style="width:10%">ID Kategori</th>
                    <th style="width:25%">Nama Kategori</th>
                    <th>Keterangan</th>
                    <th style="width:18%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kat)
                    <tr>
                        <td>{{ $kat->id }}</td>
                        <td>{{ $kat->nama_kategori }}</td>
                        <td>{{ $kat->keterangan }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('kategori.edit', $kat->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('kategori.create') }}" class="btn btn-success">[ + ] Tambah Kategori Baru...</a>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center">Konfirmasi</h5>
                </div>
                <div class="modal-body text-center">
                    Apakah Anda yakin ingin menghapus kategori ini?
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="btnYaHapus" class="btn btn-primary">Ya!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Delete -->
    <script>
        let formTarget = null;

        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                formTarget = this.closest('form');
                const modalEl = document.getElementById('modalHapus');
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            });
        });

        document.getElementById('btnYaHapus').addEventListener('click', () => {
            if (formTarget) {
                formTarget.submit();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const alertBox = document.getElementById('alertSukses');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.opacity = '0';
                    setTimeout(() => alertBox.remove(), 500);
                }, 3000);
            }
        });
    </script>
@endsection