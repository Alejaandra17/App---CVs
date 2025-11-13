<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Gestor de Currículums')</title>
  <link rel="icon" href="{{ url('favicon.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --color-primario: #1eaf5aff;
      --color-secundario: #e2e8f0;
      --color-fondo: #f8fafc;
    }

    body {
      background-color: var(--color-fondo);
      font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
      color: #333;
    }

    .navbar {
      background-color: var(--color-primario);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .nav-link {
      color: #e2e8f0 !important;
      font-weight: 500;
    }

    .nav-link.active {
      color: #fff !important;
      text-decoration: underline;
    }

    main {
      padding-top: 90px;
    }

    .card {
      border: none;
      border-radius: 0.75rem;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.25s ease;
      background-color: #fff;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .cv-foto {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-top-left-radius: 0.75rem;
      border-top-right-radius: 0.75rem;
      background-color: #f1f5f9;
    }

    footer {
      margin-top: 3rem;
      padding: 2rem 0;
      background-color: #fff;
      border-top: 1px solid #e5e7eb;
      color: #6b7280;
      text-align: center;
      font-size: 0.9rem;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('alumnos.index') }}">
        <i class="bi bi-person-badge"></i> Gestor de CVs
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('alumnos.index') ? 'active' : '' }}"
               href="{{ route('alumnos.index') }}">Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('alumnos.create') ? 'active' : '' }}"
               href="{{ route('alumnos.create') }}">Nuevo CV</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENIDO -->
  <main class="container">
    <!-- Mensajes -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @error('general')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer>
    <p>&copy; {{ date('Y') }} Terms & Privacy Policy</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
