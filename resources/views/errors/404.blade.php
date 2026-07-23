<!DOCTYPE html>
<html lang="{{ env("APP_LOCALE") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>404</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
               <div class="col col-sm-12 col-md-5 text-center">
                  <h1 class="display-1 fw-bold text-danger mb-0">404</h1>
                  <h2 class="h4 text-dark mb-3">HOUVE UM ERRO 404</h2>
                  <button class="btn btn-danger rounded"><a href="{{ route("home") }}" class="text-white text-decoration-none">VOLTAR PARA O INICIO</a></button>
               </div>
            </div>
        </div>
    </main>
</body>
</html>