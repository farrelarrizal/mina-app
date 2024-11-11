@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="<?= asset('assets/css/plugins/dropzone.min.css') ?>" >
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h5>Unggah Banner</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('dashboard.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="title">Judul Banner
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Masukkan Judul" required >
                            <small> Judul banner harus berbeda dengan yang sudah ada!</small>
                        </div>
                        <!-- upload image -->
                        <div class="form-group">
                            <label class="form-label" for="image">Upload Image
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <br>
                        <div class="form-group justify-content-end d-flex">
                            <a href="{{ route('dashboard.banner.index')}}" class="btn btn-info col-2 mb-4">Back</a>
                            <button type="submit" class="btn btn-primary mb-4 col-10">Unggah Sekarang!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="<?= asset('assets/js/plugins/ckeditor/classic/ckeditor.js') ?>"></script>
<script src="<?= asset('assets/js/plugins/dropzone-amd-module.min.js') ?>"></script>
<script>
    (function () {
    ClassicEditor.create(document.querySelector('#classic-editor')).catch((error) => {
        console.error(error);
    });
    })();
</script>

@endsection