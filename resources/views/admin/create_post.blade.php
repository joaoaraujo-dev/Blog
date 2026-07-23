@extends("teamplate.layout_base")
@section("title", "Criar postagem")

@section("header")
      @component("admin.component.header")
      {{-- Header --}}
      @endcomponent
@endsection

@section("popup")
      @if (Session::has("success"))
         @include("admin.includes.popups.success", [
             "text" => Session::get("success")
         ])
      @endif
@endsection

@section("content")
       <form class="border p-4 rounded mb-3 mt-3" action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="mb-3">
             <label for="title" class="form-label">Titulo</label>
             <input type="text" name="title" class="form-control" id="title" placeholder="Hello World!!" required>
           </div>
           <div class="mb-3">
             <label for="description" class="form-label">Descrição</label>
             <input type="text" name="description" class="form-control" id="description" placeholder="Olá a todos bem vindo a meu blog" required>
           </div>
           <div class="mb-3">
             <label for="image" class="form-label">Imagem</label>
             <input type="file" name="image" class="form-control" id="image" required>
           </div>

           <div class="mb-3">
              <label for="category" class="form-label">Selecione uma categoria:</label>
              <select name="category_id" id="category" class="form-select">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">
                           {{ $category->name }}
                      </option>
                  @endforeach
              </select>
           </div>

           <div class="mb-3">
              <label for="text" class="form-label">Conteudo</label>
              <textarea class="form-control" name="text" id="text" rows="3"></textarea>
           </div>

           <button type="submit" class="btn btn-success">Enviar</button>
       </form>
@endsection