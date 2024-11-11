@extends('layouts.app')
@section('content')


<!-- if isset session error -->
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <!-- center height -->
                <h4>Halaman Banner Landing Page</h4>
            </div>
            <div class="col-6">
                <a href="{{ route('dashboard.banner.create') }}" class="btn btn-primary btn-sm float-end">
                    <span class="icon-border_color">
                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Banner
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
            <th>Judul</th>
            <th>Image</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>
                        <img src="{{ asset($banner->image_path) }}" alt="{{ $banner->title }}" width="800" height="400">
                    </td>
                    <td>
                        <div class="mb-2">
                            @if ($banner->is_active)
                                <button type="button" class="btn btn-light-success btn-sm w-100 status">
                                    <!-- status icon -->
                                    <span class="icon-border_color">
                                        <i class="fa fa-check" aria-hidden="true"></i> Aktif
                                    </span>
                                </button>
                            @else
                                <button type="button" class="btn btn-light-danger btn-sm w-100 status">
                                    <!-- status icon -->
                                    <span class="icon-border_color">
                                        <i class="fa fa-times" aria-hidden="true"></i> Tidak Aktif
                                    </span>
                                </button>
                            @endif
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger btn-sm w-100 delete">
                                <span class="icon-border_color">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                </span>
                            </button>
                        </div>
                    </td>
                    
                    
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?= asset('assets/js/plugins/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('assets/js/plugins/dataTables.bootstrap5.min.js') ?>"></script>
<!-- Datatable -->
<script>
  $(document).ready(function() {
    $('#dom-jqry').DataTable();
  });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.delete').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log(href);
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            // redirect to href
            if (result.isConfirmed) {
                document.location.href = href;
            }


        })
    })

    // sweet alert confirmations if button swith clicked
    $('.form-check-input').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log(href);
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: 'Data yang diubah mempengaruhi tampilan website!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Ubah!'
        }).then((result) => {
            // redirect to href
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })
        

</script>
@endsection