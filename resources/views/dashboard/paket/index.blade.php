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
                    <!-- center height -->
                    <h5>Daftar Paket Mina Wisata</h5>
                </div>
                <div class="col-6">
                    <a href="{{ route('dashboard.paket.create') }}" class="btn btn-primary btn-sm float-end">
                        <span class="icon-border_color">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Paket
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
                <th>Nama Paket</th>
                <th>Tipe Paket</th>
                <th>Durasi</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>
                        <img src="{{ asset($package->media_banner) }}" alt="{{ $package->package_name }}" width="100">
                    </td>
                    <td>
                        {{ $package->package_name }}
                        <br>
                        <small>
                            <a href="{{ url('package/'.$package->slug) }}">{{ url('package/'.$package->slug) }}</a>
                        </small>
                    </td>
                    <td>{{ $package->category_name }}</td>
                    <td>{{ $package->duration }}</td>
                    <td>
                        <a href="{{ route('dashboard.paket.edit', $package->package_id) }}" class="btn btn-warning btn-sm">
                            <span class="icon-border_color">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                            </span>
                        </a>                        
                        <a href="{{ route('dashboard.paket.delete', $package->package_id) }}" class="btn btn-danger btn-sm delete">
                            <span class="icon-border_color">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                            </span>
                        </a>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
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
</script>
@endsection