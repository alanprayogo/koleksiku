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
                                    @forelse ($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->code }}</td>
                                            <td>{{ $book->category ? $book->category->category_name : 'Kategori tidak tersedia' }}
                                            </td>
                                            <td>{{ $book->book_title }}</td>
                                            <td>{{ $book->book_author }}</td>
                                            <td>
                                                <a href="{{ route('show-edit-book', $book->id) }}" type="button"
                                                    class="btn btn-sm btn-warning btn-icon-text">
                                                    <i class="ti-file btn-icon-append"></i> Ubah
                                                </a>
                                                <a href="{{ route('delete-book', $book->id) }}"
                                                    class="btn btn-sm btn-danger btn-icon-text"
                                                    id="deleteBook{{ $book->id }}">
                                                    <i class="ti-trash btn-icon-append"></i> Hapus
                                                </a>
                                                <form action="{{ route('delete-book', $book->id) }}"
                                                    id="delete-book-form{{ $book->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada buku yang tersedia.</td>
                                        </tr>
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
        @foreach ($books as $book)
            <script>
                document.getElementById('deleteBook{{ $book->id }}').addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: "Apakah kamu yakin menghapus buku ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-book-form{{ $book->id }}').submit();
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
