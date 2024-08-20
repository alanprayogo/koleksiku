@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Buku</h4>
                        <a href="{{ route('show-add-book') }}" type="button" class="btn btn-primary btn-icon-text">
                            <i class="ti-plus btn-icon-prepend"></i> Tambah Buku
                        </a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Kategori</th>
                                        <th>Judul Buku</th>
                                        <th>Pengarang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>NV-01</td>
                                        <td>Novel</td>
                                        <td>Home Sweet Loan</td>
                                        <td>Agata</td>
                                        <td>
                                            <a href="{{ route('show-edit-book') }}" type="button"
                                                class="btn btn-sm btn-warning btn-icon-text">
                                                <i class="ti-file btn-icon-append"></i> Ubah
                                            </a>
                                            <a href="" type="button" class="btn btn-sm btn-danger btn-icon-text">
                                                <i class="ti-trash btn-icon-append"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
