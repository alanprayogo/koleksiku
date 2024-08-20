@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulir Ubah Buku</h4>
                        <form action="{{ route('edit-book', $book->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_category">Kategori</label>
                                        <select class="form-select" id="input_book_category" name="id_category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $book->id_category ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_code">Kode Buku</label>
                                        <input type="text" class="form-control" id="input_book_code" name="code"
                                            value="{{ $bookCode }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_title">Judul Buku</label>
                                        <input type="text" class="form-control" id="input_book_title" name="book_title"
                                            value="{{ $book->book_title }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_book_author">Pengarang</label>
                                        <input type="text" class="form-control" id="input_book_author" name="book_author"
                                            value="{{ $book->book_author }}">
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
