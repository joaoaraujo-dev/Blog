@extends("teamplate.login")
@section("title", "Login")

@section("content")

   <form class="d-flex justify-content-center align-items-center" action="{{ route("auth") }}" method="POST">
   @csrf

      <div class="col col-xl-7 col-sm-12 border">
         <h2 class="text-center mt-3">Login</h2>
         <div class="mb-3 ps-2">
            <label for="" class="form-label">Endereço de email</label>
            <input class="form-control" type="email" name="email" id="email">
            <div id="emailHelp" class="form-text">Digite o seu email</div>
         </div>
         <div class="mb-3 ps-2">
            <label for="" class="form-label">Senha</label>
            <input class="form-control" type="password" name="password" id="password">
         </div>
         <div class="d-flex mb-3 ms-2 form-check">
            <input class="form-check-input" type="checkbox" id="save">
            <label class="form-check-label ms-1" name="remember" for="Check">Salvar senha</label>
            <a class="ms-md-auto" href="{{ route("register.form") }}">Criar conta</a>
         </div>

         <div class="mb-3">
            @if ($mensagem = Session::get("failedLogin"))
              <p class="text-secundary ms-2">{{ $mensagem }}</p>
            @else
               @if ($errors->any())
               @foreach ($errors->all() as $error)
                  <p class="text-secundary ms-2">{{ $error }}</p> {{-- Puxa todos os erros --}}
               @endforeach
               @endif
            @endif
         </div>

         <button class="btn btn-primary mb-3 ms-2" type="submit">Logar</button>
      </div>

   </form>
@endsection