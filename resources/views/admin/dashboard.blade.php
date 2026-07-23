@extends("teamplate.layout_dashboard")
@section("title", "Dashboard")

@section("content")
       <div class="row align-items-center g-4 my-3">
          <div class="col-12 fs-2 mb-3 text-bg-success p-3 rounded-4">
             <i class="bi bi-people-fill"></i><h3>Usuarios</h3>
             <span>{{ $stats["n_users"] }}</span>
          </div>
          <div class="col-12 fs-2 mb-3 text-bg-danger p-3 rounded-4">
             <i class="bi bi-file-earmark-post"></i><h3>Postangens</h3>
             <span>{{ $stats["n_posts"] }}</span>
          </div>
          <div class="col-12 fs-2 mb-3 text-bg-primary p-3 rounded-4">
             <i class="bi bi-chat-dots-fill"></i><h3>Comentarios</h3>
             <span>{{ $stats["n_comments"] }}</span>
          </div>
       </div>
@endsection

{{-- ChartJS --}}
@push("chart")
    <script>
          document.getElementById("year").innerText = new Date().getFullYear();

          const ctx = document.getElementById('barChart');
          
          new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [ @json($month) ],
            datasets: [{
                label: "Usuarios",
                data: [ {{ $c_total }} ],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
   
@endpush