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
                                                <a href="{{ route('delete-category', $category->id) }}"
                                                    class="btn btn-sm btn-danger btn-icon-text"
                                                    id="deleteCategory{{ $category->id }}">
                                                    <i class="ti-trash btn-icon-append"></i> Hapus
                                                </a>
                                                <form action="{{ route('delete-category', $category->id) }}"
                                                    id="delete-category-form{{ $category->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
    @push('js')
        @foreach ($categories as $category)
            <script>
                document.getElementById('deleteCategory{{ $category->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: "Apakah kamu yakin menghapus kategori ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-category-form{{ $category->id }}').submit();
                        }
                    })
                });
            </script>
        @endforeach
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
    @endpush
@endsection
