<!DOCTYPE html>
<html lang="{{ env("APP_LOCALE") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/main.css") }}">

    <title>@yield("title")</title>
</head>
<body>
    <header>
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand title-home" href="{{ route("home") }}">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                @auth

                    @if (auth()->user()->is_admin == 1)
                        <ul class="navbar-nav ms-auto me-4">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route("admin.dashboard") }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Blog</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorias
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item" href="{{ route("posts.category", $category->id) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre Nós</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contato</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route("logout") }}">Sair</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto me-4">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Blog</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorias
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item" href="{{ route("posts.category", $category->id) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre Nós</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Contato</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route("logout") }}">Sair</a>
                            </li>
                        </ul>

                        <div class="d-flex col-md-9 justify-content-end align-items-center">
                            <span class="me-2">{{ auth()->user()->name }}</span>
                            <i class="bi bi-person-fill" style="color: #000000;"></i>
                        </div>
                    @endif

                @else
                   <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Blog</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route("posts.category", $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nós</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route("login.form") }}">Login</a>
                    </li>
                   </ul>
                @endauth

                </div>
            </div>
          </nav>
    </header>

    <section>
          @yield("welcome")
    </section>

    <main>
        @yield("content")
    </main>

    <section>
          <div class="d-flex justify-content-center mt-4">
             {{ $posts->links() }}
          </div>
    </section>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            &copy; <span id="year"></span> Copyright:
            <a class="text-body" href="#">Blog</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>