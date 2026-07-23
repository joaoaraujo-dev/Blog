@extends("teamplate.post")
@section("title", $post->title)

@section("content")
       <div class="col-12 col-lg-8 mx-auto">
          <figure class="mb-4">
                <img src="{{ url("storage/". $post->image) }}" 
                     class="img-fluid rounded w-100" 
                     alt="logo" 
                     style="max-height: 400px; object-fit: cover;">
          </figure>
          <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
          <section class="post-content lh-lg fs-5">
                <p class="text-black mb-2">{{ $post->text }}</p>
          </section>
       </div>
@endsection

@section("makeComment")
       <div class="mb-3">
          <textarea class="form-control" name="comment" id="text" placeholder="Escreva um comentario..." rows="4" required></textarea>
       </div>
       <div class="mb-3">
          <button class="btn btn-primary" type="submit">Enviar</button>
       </div>
@endsection

@section("comments")
       @foreach ($comments as $comment)
             @if ($comment->post_id == $post->id) {{-- Se o post_id for igual ao post_id ele mostra o comentario --}}
                <div class="box ps-2">
                   <h4 class="mt-2">{{ $comment->user->name }}</h4>
                   <p class="lead">{{ $comment->comment }}</p>
                </div>
             @endif
       @endforeach
@endsection