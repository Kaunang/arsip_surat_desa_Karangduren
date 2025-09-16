@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
  <h3 class="ms-5">Arsip Surat</h3>
  <p class="ms-5">
    Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
    Klik "Lihat" pada kolom aksi untuk menampilkan surat.
  </p>

  <!-- Search -->
  <form class="row g-2 align-items-center mb-3 mt-4" method="GET" action="{{ route('arsip.index') }}">
    <div class="col-auto">
      <label for="search" class="col-form-label fw-semibold me-3">Cari surat:</label>
    </div>

    <div class="col-md-6 col-sm-8">
      <div class="input-group">
        <span class="input-group-text bg-white">
          <i class="bi bi-search"></i>
        </span>
        <input id="search" name="q" class="form-control" type="search" placeholder="Search" value="{{ $q ?? '' }}">
        @if(!empty($q))
          <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary">✕</a>
        @endif
      </div>
    </div>

    <div class="col-auto">
      <button class="btn btn-outline-primary" type="submit">Cari</button>
    </div>
  </form>

  @if(session('ok'))
    <div id="alertSukses" class="alert alert-success" role="alert">
      {{ session('ok') }}
    </div>
  @endif

  <!-- Table -->
  <table class="table table-bordered">
    <thead class="table-secondary">
      <tr>
        <th>Nomor Surat</th>
        <th>Kategori</th>
        <th>Judul</th>
        <th>Waktu Pengarsipan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($arsips as $arsip)
        <tr id="arsip-{{ $arsip->id }}">
          <td>{{ $arsip->nomor_surat }}</td>
          <td>{{ $arsip->kategori->nama_kategori }}</td>
          <td>{{ $arsip->judul }}</td>
          <td>{{ $arsip->created_at }}</td>
          <td>
            <form action="{{ route('arsip.destroy', $arsip->id) }}" method="POST" class="d-inline"
              onsubmit="event.preventDefault(); confirmHapus(this, '{{ $arsip->id }}');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="{{ asset('storage/' . $arsip->file) }}" class="btn btn-sm btn-warning" download>Unduh</a>
            <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-sm btn-primary">Lihat &raquo;</a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">Belum ada arsip.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>

  <!-- Modal Konfirmasi Hapus -->
  <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4">
        <div class="modal-header border-0">
          <h5 class="modal-title w-100 text-center">Konfirmasi</h5>
        </div>
        <div class="modal-body text-center">
          Apakah Anda yakin ingin menghapus arsip surat ini?
        </div>
        <div class="modal-footer border-0 justify-content-center">
          <button type="button" class="btn btn-outline-secondary me-2" data-bs-dismiss="modal">Batal</button>
          <button type="button" id="btnYaHapus" class="btn btn-primary">Ya!</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let deleteForm = null;

    function confirmHapus(formEl, id) {
      deleteForm = formEl;
      const modalEl = document.getElementById('modalHapus');
      const modal = new bootstrap.Modal(modalEl);
      modal.show();

      document.getElementById('btnYaHapus').onclick = () => {
        modal.hide();
        if (deleteForm) deleteForm.submit();
      }
    }

    setTimeout(() => {
      const alertBox = document.getElementById('alertSukses');
      if (alertBox) {
        alertBox.style.transition = 'opacity 0.5s ease';
        alertBox.style.opacity = '0';
        setTimeout(() => alertBox.remove(), 500);
      }
    }, 3000);
  </script>
@endsection