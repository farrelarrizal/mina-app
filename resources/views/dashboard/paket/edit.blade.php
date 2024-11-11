{{-- @dd($paket) --}}
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dropzone.min.css') }}">
@endsection
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Paket</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('dashboard.paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label" for="title">Nama Paket <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $paket->package_name) }}" placeholder="Masukkan Nama Paket">
                            <small> Nama Paket harus berbeda dengan yang sudah ada! Nama Paket akan menjadi url artikel secara otomatis.</small>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Deskripsi Paket <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan Deskripsi Paket">{{ old('description', $paket->package_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label col-lg-2 col-sm-12">Pilih Tipe Paket</label>
                            <div class="col-lg-12 col-md-11 col-sm-12">
                                <select class="form-control" data-trigger name="tipe_paket" id="tipe_paket">
                                    <option value="">Pilih Tipe Paket</option>
                                    @foreach($tipe_paket as $tipe)
                                        <option value="{{ $tipe->id }}" {{ $paket->tipe_paket == $tipe->id ? 'selected' : '' }}>{{ $tipe->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <!-- Populate other fields with existing values similarly -->
                        <div class="form-group">
                            <label class="form-label" for="duration">Durasi (Hari) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $paket->duration) }}" placeholder="Masukkan Durasi Paket">
                        </div>

                        <!-- Repeat for other fields: maskapai, hotel_madinah, hotel_makkah, etc. -->

                        <div class="form-group">
                            <label class="form-label" for="harga_quad">Harga Quad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control price" id="harga_quad" name="harga_quad" value="{{ old('harga_quad', $paket->harga_quad) }}" placeholder="Masukkan Harga Quad">
                        </div>

                        <!-- Textareas for Perlengkapan, Dokumen Persyaratan, Fasilitas, etc. -->
                        <div class="mt-2">
                            <label class="form-label" for="classic-editor">Perlengkapan<span class="text-danger">*</span></label>
                            <textarea name="perlengkapan" id="classic-editor" placeholder="Masukkan Perlengkapan yang didapatkan jamaah">{{ old('perlengkapan', $paket->perlengkapan) }}</textarea>
                        </div>

                        <!-- For file inputs, you might want to show existing files as links or previews -->

                        <hr>
                        <div class="form-group justify-content-end d-flex">
                            <a href="{{ route('dashboard.artikel.index')}}" class="btn btn-info col-2 mb-4">Back</a>
                            <button type="submit" class="btn btn-primary mb-4 col-10">Update Paket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/ckeditor/classic/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dropzone-amd-module.min.js') }}"></script>
<script>
    ClassicEditor.create(document.querySelector('#classic-editor')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#classic-editor2')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#classic-editor3')).catch(error => console.error(error));
    ClassicEditor.create(document.querySelector('#classic-editor4')).catch(error => console.error(error));

    const choices = new Choices('#tipe_paket', {
        searchEnabled: true,
        itemSelectText: '',
    });

    $('.price').on('keyup', function() {
        var val = this.value.replace(/\D/g, '');
        val = val.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        this.value = val;
    });
</script>
@endsection
