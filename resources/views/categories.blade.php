@extends("teamplate.layout")
@section("title", $category->name ?? "Area vazia")

@section("welcome")
     <div class="container">
        <div class="row align-items-center justify-content-center text-center">
           <h1 class="welcome">Bem vindo(a) ao meu Blog</h1>
           <p class="text-secundary">Aqui compartilhamos experiencias e momentos</p>

           <div class="col col-sm-9 col-md-4 py-4">
              <form action="{{ route("search") }}" method="GET">
                  <input class="form-control py-3 ps-4" name="search" type="search" placeholder="Pesquisar...">
              </form>
           </div>
        </div>
     </div>
@endsection

@section("content")
    <div class="container">
       <div class="row row-cols-1 justify-content-center">
          @foreach ($posts as $post)

          <div class="col col-sm-12 col-md-5 py-4 justify-content-center align-items-center">
             <a href="{{ route("post", $post->slug) }}" class="text-decoration-none" target="_blank">
               <img class="rounded" src="{{ url("storage/". $post->image) }}" style="height: 320px; width: 100%; object-fit: cover;">
               <span class="badge mb-2 align-self-start" style="background: #283A61;">{{ $post->category->name ?? "Sem categoria" }}</span>
               <h2 class="post-title text-black">{{ $post->title }}</h2>
               <p class="text-secundary">{{ $post->description }}</p>
            </a>
          </div>

          @endforeach
       </div>
    </div>
@endsection