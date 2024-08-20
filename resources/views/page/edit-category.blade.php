@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulir Ubah Kategori</h4>
                        <form action="{{ route('edit-category', $category->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_category_name">Nama Kategori</label>
                                        <input type="text" class="form-control" id="input_category_name" name="category_name"
                                            value="{{ $category->category_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_category_code">Kode Kategori</label>
                                        <input type="text" class="form-control" id="input_category_code" name="category_code"
                                            value="{{ $category->category_code }}">
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
@endsection
