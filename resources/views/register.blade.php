@extends("teamplate.login")
@section("title", "Registrar-se")

@section("content")
    <form action="{{ route("users.store") }}" method="POST">
        @csrf
        <div class="col col-sm-12 border">
            <h1 class="ms-2 mt-3">Registrar-se</h1>
            <div class="mb-3 ms-2">
                <label for="exampleFormControlInput1" class="form-label">Nome de usuario</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Gabriel">
            </div>
            <div class="mb-3 ms-2">
                <label for="exampleFormControlInput1" class="form-label">Endereço de email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="gabriel.ay1328@example.com">
            </div>
            <div class="mb-3 ms-2">
                <label for="exampleFormControlInput1" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Utilize uma senha forte" maxlength="30">
            </div>
            <div class="mb-3 ms-2">
                <label for="exampleFormControlInput1" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Repita a senha" maxlength="30">
            </div>
            <div class="d-flex align-items-end">
               <a class="ms-auto" href="{{ route("login.form") }}">Ja tenho uma conta</a>
            </div>

            @if ($message = Session::get("passError"))
                <p class="text-secundary ms-2"> {{ $message }}</p>
            @endif

            <button class="btn btn-primary mb-3 ms-2" type="submit">Criar conta</button>
        </div>
    </form>
@endsection