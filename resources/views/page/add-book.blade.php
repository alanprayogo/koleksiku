@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulir Tambah Buku</h4>
                        <form action="{{ route('add-book') }}" class="forms-sample" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_category">Kategori</label>
                                        <select class="form-select" id="input_book_category" name="id_category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_code">Kode Buku</label>
                                        <input type="text" class="form-control" id="input_book_code" name="code"
                                            placeholder="Kode Buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_title">Judul Buku</label>
                                        <input type="text" class="form-control" id="input_book_title" name="book_title"
                                            placeholder="Judul Buku">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_author">Pengarang</label>
                                        <input type="text" class="form-control" id="input_book_author" name="book_author"
                                            placeholder="Pengarang">
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
