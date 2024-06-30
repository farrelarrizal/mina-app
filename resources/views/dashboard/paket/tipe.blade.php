@extends('layouts.app')
@section('content')
{{-- <div class="col-sm-12"> --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <!-- center height -->
                <h5>TIPE PAKET</h5>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary btn-sm float-end">
                    <span class="icon-border_color">
                        <!-- icon add with fontawesome -->
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Data
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
    <div class="table-responsive dt-responsive">
        <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipe_paket as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category_name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    @if ($item->is_active == 1)
                        {{-- <span class=" btn-light-success">Active</span> --}}
                        <span class="badge bg-light-success">Active</span> 
                    @else
                        <span class="badge bg-light-danger">Inactive</span>
                    @endif
                </td>
                <!-- action -->
                <td>
                    <a href="#" class="btn btn-warning btn-sm">
                        <span class="icon-border_color">
                            <!-- icon edit with fontawesome -->
                            <i class="fa fa-edit" aria-hidden="true"></i> Edit
                        </span>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm">
                        <span class="icon-border_color">
                            <!-- icon delete with fontawesome -->
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
@endsection