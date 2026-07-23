@extends("teamplate.layout_base")
@section("title", "Tabela de postagem")

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
      <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#create">Criar</button>

      <table class="table table-striped border">
           <thead class="thead-dark">
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Numero de postagens</th>
                    <th scope="col">Ações</th>
                </tr>
           </thead>
           <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td>
                      <form action="{{ route("categories.destroy", $category->id) }}" method="POST">
                         @csrf
                         @method("DELETE")
                         <button class="btn btn-danger mb-2">
                              Deletar
                         </button>
                      </form>
                         <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#editcategory" 
                                 data-bs-name="{{ $category->name }}">
                              Editar
                         </button>
                    </td>
                </tr>
                @endforeach
                @section("modal")

                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="Labelname" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="Labelname">Criar categoria</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <form action="{{ route("categories.store") }}" method="POST">
                                             @csrf
                                             <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                                <input type="text" class="form-control" name="name" id="recipient-name">
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                           <button type="submit" class="btn btn-primary">Criar</button>
                                        </form>
                                   </div>
                              </div>
                         </div>
                </div>

                @foreach ($categories as $category)
                    <div class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="Labelname" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="Labelname">Editar Categoria</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <form action="{{ route("categories.update", $category->id) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                                <input type="text" class="form-control" name="name" id="recipient-name">
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
               @endforeach
               @endsection
          </tbody>
     </table>
     <div class="d-flex justify-content-center mt-4">
          {{ $categories->links() }}
     </div>
@endsection

@push("modal")
     <script>
           const Modals = {
               create: document.getElementById('create'),
               edit: document.getElementById('editcategory')
           }

           if (Modals.create) {
               Modals.create.addEventListener('show.bs.modal', event => {
              
                    const button = event.relatedTarget
                    
                    const modalTitle = Modals.create.querySelector('.modal-title')

                    modalTitle.textContent = `Criar Categoria`

               })
           }

           if (Modals.edit) {
               Modals.edit.addEventListener('show.bs.modal', event => {
              
                    const button = event.relatedTarget
               
                    const name = button.getAttribute('data-bs-name')
                    
                    const modalTitle = Modals.edit.querySelector('.modal-title')
                    const inputName = Modals.edit.querySelector('#recipient-name')

                    modalTitle.textContent = `Editar categoria ${name}`
                    inputName.value = name

               })
           }
     </script>
@endpush