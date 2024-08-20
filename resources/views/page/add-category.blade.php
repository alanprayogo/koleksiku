@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulir Tambah Kategori</h4>
                        <form class="forms-sample">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Nama Kategori</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Kode Kategori</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
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
