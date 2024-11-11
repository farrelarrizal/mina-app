@extends('layouts.app')
@section('content')
<!-- if isset session success -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- if isset session error -->
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>LIST ARTIKEL</h5>
                </div>
                <div class="col-6">
                    <a href="{{ route('dashboard.artikel.create') }}" class="btn btn-primary btn-sm float-end">
                        <span class="icon-border_color">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Artikel
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Judul Artikel</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" width="100">
                                </td>
                                <td>
                                    {{ $article->title }}
                                    <br>
                                    <small>
                                        <a href="{{ url('article/'.$article->url) }}">{{ url('article/'.$article->url) }}</a>
                                    </small>
                                </td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <a href="{{ route('dashboard.artikel.edit', $article->id) }}" class="btn btn-warning btn-sm">
                                        <span class="icon-border_color">
                                            <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                        </span>
                                    </a>
                                    <button class="btn btn-danger btn-sm delete" href="{{ route('dashboard.artikel.delete', $article->id) }}">
                                        <span class="icon-border_color">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<!-- Datatable -->
<script>
  $(document).ready(function() {
      $('#dom-jqry').DataTable({
          paging: false // Disable DataTable's built-in pagination
      });
  });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
</script>
@endsection
