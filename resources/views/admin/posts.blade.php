@extends("teamplate.layout_base")
@section("title", "Tabela de postagem")

@component("admin.component.header")
{{-- Header --}}
@endcomponent

@section("popup")
      @if (Session::has("success"))
         @include("admin.includes.popups.success", [
             "text" => Session::get("success")
         ])
      @endif
@endsection

@section("content")
      <table class="table table-striped border">
           <thead class="thead-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Ações</th>
                </tr>
           </thead>
           <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ Str::limit($post->title, 50, "...") }}</td>
                    <td>{{ Str::limit($post->description, 80, "...") }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                      <form action="{{ route("posts.destroy", $post->id) }}" method="POST">
                         @csrf
                         @method("DELETE")
                         <button class="btn btn-danger">
                              Deletar
                         </button>
                      </form>
                      <button type="button" 
                              class="btn btn-primary" data-bs-toggle="modal" 
                              data-bs-target="#editpost"
                              data-bs-url="{{ route("posts.update", $post->id) }}"
                              data-bs-title="{{ $post->title }}"
                              data-bs-category="{{ $post->category_id }}"
                              data-bs-description="{{ $post->description }}"
                              data-bs-image="{{ $post->image }}"
                              data-bs-text="{{ $post->text }}">
                         Editar
                      </button>
                    </td>
                </tr>
                @endforeach
           </tbody>
      </table>
      <div class="d-flex justify-content-center mt-4">
          {{ $posts->links() }}
      </div>
@endsection

@section("modal")
<div class="modal fade" id="editpost" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h1 class="modal-title fs-5">Editar postagem</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
               <form id="editPostForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                       <label for="recipient-title" class="col-form-label">Titulo:</label>
                       <input type="text" class="form-control" name="title" id="recipient-title">
                    </div>
                    
                    <div class="mb-3">
                       <label for="recipient-description" class="col-form-label">Descrição:</label>
                       <input type="text" class="form-control" name="description" id="recipient-description">
                    </div>
                    
                    <div class="mb-3">
                         <label for="recipient-category" class="col-form-label">Categoria:</label>
                         <select name="category_id" id="recipient-category" class="form-select">
                              @foreach ($categories as $category)
                                   <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                   </option>
                              @endforeach
                         </select>
                    </div>
                    
                    <div class="mb-3">
                         <img id="modal-img-preview" class="img-fluid rounded" src="" data-base-url="{{ url('storage') }}">
                    </div>
                    
                    <div class="mb-3">
                         <label for="recipient-image" class="col-form-label">Imagem:</label>
                         <input type="text" class="form-control" name="image" id="recipient-image">
                    </div>
                    
                    <div class="mb-3">
                         <label for="recipient-text" class="col-form-label">Conteudo:</label>
                         <input type="text" class="form-control" name="text" id="recipient-text">
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Editar</button>
               </form>
               </div>
          </div>
     </div>
</div>
@endsection

@push("modal")
     <script>
           const Modal = document.getElementById('editpost')

           if (Modal) {
               Modal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget
               
                    const urlForm = button.getAttribute('data-bs-url')
                    const title = button.getAttribute('data-bs-title')
                    const description = button.getAttribute('data-bs-description')
                    const category = button.getAttribute('data-bs-category')
                    const image = button.getAttribute('data-bs-image')
                    const content = button.getAttribute('data-bs-text')

                    const Action = Modal.querySelector('#editPostForm')
                    const inputTitle = Modal.querySelector('#recipient-title')
                    const inputDescription = Modal.querySelector('#recipient-description')
                    const inputCategory = Modal.querySelector('#recipient-category')
                    const imgPreview = Modal.querySelector('#modal-img-preview')
                    const inputImage = Modal.querySelector('#recipient-image')
                    const inputContent = Modal.querySelector('#recipient-text')

                    Action.setAttribute('action', urlForm)
                    inputTitle.value = title
                    inputDescription.value = description
                    inputCategory.value = category
                    inputImage.value = image
                    inputContent.value = content

                    const baseUrl = imgPreview.getAttribute('data-base-url')
                    imgPreview.src = image ? `${baseUrl}/${image}` : ''
               })
           }
     </script>
@endpush