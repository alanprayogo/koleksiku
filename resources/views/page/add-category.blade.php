@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulir Tambah Kategori</h4>
                        <form action="{{ route('add-category') }}" class="forms-sample" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_category_code">Kode Kategori</label>
                                        <input type="text" class="form-control" id="input_category_code"
                                            placeholder="Kode Kategori" name="category_code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_category">Nama Kategori</label>
                                        <input type="text" class="form-control" id="input_category"
                                            placeholder="Name Kategori" name="category_name">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button class="btn btn-light">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
@endsection
