@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Kategori</h4>
                        <a href="{{ route('show-add-category') }}" type="button" class="btn btn-primary btn-icon-text">
                            <i class="ti-plus btn-icon-prepend"></i> Tambah Kategori
                        </a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->category_code }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <a href="{{ route('show-edit-category', $category->id) }}" type="button"
                                                    class="btn btn-sm btn-warning btn-icon-text">
                                                    <i class="ti-file btn-icon-append"></i> Ubah
                                                </a>
                                                <a href="" type="button"
                                                    class="btn btn-sm btn-danger btn-icon-text">
                                                    <i class="ti-trash btn-icon-append"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
