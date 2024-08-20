<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function showBook()
    {
        // Ambil semua data buku beserta kategori dari database
        $books = Book::with('category')->get();

        // Kirim data buku ke view 'page.book'
        return view('page.book', compact('books'));
    } // show book


    public function showAddBook()
    {
         // Ambil semua kategori dari database
        $categories = Category::all();

        // Kirim data kategori ke view
        return view('page.add-book', compact('categories'));
    } // show add book

    public function addBook(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_category' => 'required|exists:categories,id',
            'code' => 'required|string|max:255',
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
        ]);

        $category_code = Category::findOrFail($validatedData['id_category']);
        $code = $category_code->category_code.' - '.$validatedData['code'] ;

        // Buat dan simpan buku baru
        $book = new Book();
        $book->id_category = $validatedData['id_category'];
        $book->code = $code;
        $book->book_title = $validatedData['book_title'];
        $book->book_author = $validatedData['book_author'];
        $book->save();

        // Tambahkan session flash untuk SweetAlert
        $request->session()->flash('success', 'Buku berhasil ditambahkan!');

        // Redirect kembali ke halaman form
        return redirect()->route('show-book');
    } // add book

    public function showEditBook($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        $fullCode = $book->code; // Misalnya kode yang disimpan adalah "ABC-123"
        $codeParts = explode(' - ', $fullCode); // Pisahkan dengan " - "
        $bookCode = $codeParts[1]; // Mengambil bagian kode buku saja, yaitu "123"

        return view('page.edit-book', compact('book', 'categories', 'bookCode'));
    } // show edit book

    public function editBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'id_category' => 'required|exists:categories,id',
            'code' => 'required|string|max:255',
            'book_title' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
        ]);

        $category_code = Category::findOrFail($validatedData['id_category']);
        $code = $category_code->category_code.' - '.$validatedData['code'] ;

        // Buat dan simpan kategori baru
        $book->update([
            'id_category' => $validatedData['id_category'],
            'code' => $code,
            'book_title' => $validatedData['book_title'],
            'book_author' => $validatedData['book_author'],
        ]);

        // Tambahkan session flash untuk SweetAlert
        $request->session()->flash('success', 'Data buku berhasil diperbarui!');

        // Redirect kembali ke halaman form
        return redirect()->route('show-book');
    } // edit-book

    public function deleteBook($id)
    {
        $data = Book::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data kategori berhasil dihapus.');
    } // delete book
}
