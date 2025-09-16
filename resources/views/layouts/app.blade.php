<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Arsip Surat')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row min-vh-100">

      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 border-end border-2 border-dark">
        <h6 class="mt-3 mb-2">Menu</h6>
        <hr class="my-2 border-dark">

        <ul class="list-unstyled mt-3 mb-0">
          <li class="mb-2 d-flex align-items-center">
            <i class="bi bi-star-fill me-2"></i>
            <a href="{{ url('/arsip') }}" class="text-decoration-none text-dark">Arsip</a>
          </li>
          <li class="mb-2 d-flex align-items-center">
            <i class="bi bi-gear-fill me-2"></i>
            <a href="{{ url('/kategori') }}" class="text-decoration-none text-dark">Kategori Surat</a>
          </li>
          <li class="d-flex align-items-center">
            <i class="bi bi-info-circle-fill me-2"></i>
            <a href="{{ url('/about') }}" class="text-decoration-none text-dark">About</a>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 mt-4">
        <div class="container">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>