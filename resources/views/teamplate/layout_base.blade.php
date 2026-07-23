<!DOCTYPE html>
<html lang="{{ env("APP_LOCALE") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <title>@yield("title")</title>
</head>
<body>

    <header>
         @yield("header")
    </header>

    <section>
           <div class="container">
              @yield("popup")
           </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col col-sm-12">
                   @yield("content")
                </div>

                @yield("modal")
            </div>
        </div>
    </main>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            &copy; <span id="year"></span> Copyright:
            <a class="text-body" href="#">Blog</a>
        </div>
        <!-- Copyright -->
    </footer>

    @stack("modal")

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>