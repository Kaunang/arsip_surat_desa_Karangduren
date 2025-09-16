@extends('layouts.app')

@section('title', 'About')

@section('content')
  <h3 class="ms-5">About</h3>

  <div class="ms-5 mt-3 d-flex align-items-start gap-4">
    <div class="border rounded-3 d-flex align-items-center justify-content-center"
      style="width:140px; height:180px; overflow:hidden;">
      <img src="{{ asset('foto/profile.jpg') }}" alt="Foto" class="img-fluid"
        style="max-height:100%; object-fit:contain;">
    </div>

    <div>
      <div class="fw-semibold mb-2">Aplikasi ini dibuat oleh:</div>
      <table class="table table-borderless table-sm mb-0">
        <tbody>
          <tr>
            <th class="pe-3">Nama</th>
            <td>: Kaunang Adi Prasetio</td>
          </tr>
          <tr>
            <th class="pe-3">Prodi</th>
            <td>: D3-MI PSDKU Kediri</td>
          </tr>
          <tr>
            <th class="pe-3">NIM</th>
            <td>: 2331730025</td>
          </tr>
          <tr>
            <th class="pe-3">Tanggal</th>
            <td>: 12 September 2025</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection