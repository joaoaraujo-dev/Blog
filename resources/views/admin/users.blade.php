@extends("teamplate.layout_base")
@section("title", "Usuarios")

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
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Ações</th>
                </tr>
           </thead>
           <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                      <form action="{{ route("users.destroy", $user->id) }}" method="POST">
                         @csrf
                         @method("DELETE")
                         <button class="btn btn-danger">
                              Deletar
                         </button>
                      </form>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edituser" data-bs-name="{{ $user->name }}" data-bs-email="{{ $user->email }}">Editar</button>
                    </td>
                </tr>

                @section("modal")
                    <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="Labelname" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="Labelname">Editar usuario</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <form action="{{ route("users.update", $user->id) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                                <input type="text" class="form-control" name="name" id="recipient-name">
                                             </div>
                                             <div class="mb-3">
                                                <label for="recipient-email" class="col-form-label">Email:</label>
                                                <input type="text" class="form-control" name="email" id="recipient-email">
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
               @endforeach
           </tbody>
      </table>
      <div class="d-flex justify-content-center mt-4">
          {{ $users->links() }}
      </div>
@endsection

@push("modal")
     <script>
           const Modal = document.getElementById('edituser')

           if (Modal) {
               Modal.addEventListener('show.bs.modal', event => {
              
                    const button = event.relatedTarget
               
                    const name = button.getAttribute('data-bs-name')
                    const email = button.getAttribute('data-bs-email')
                    
                    const modalTitle = Modal.querySelector('.modal-title')
                    const InputName = Modal.querySelector('#recipient-name')
                    const InputEmail = Modal.querySelector('#recipient-email')

                    modalTitle.textContent = `Editar usuario ${name}`
                    InputName.value = name
                    InputEmail.value = email
               })
           }
     </script>
@endpush