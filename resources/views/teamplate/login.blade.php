<!DOCTYPE html>
<html lang="{{ env("LOCALE") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>@yield("title")</title>
</head>
<body>
    <main>
        <div class="container">
           <div class="row min-vh-100 d-flex justify-content-center align-items-center">
              @yield("content")
           </div>
        </div>
    </main>
</body>
</html>