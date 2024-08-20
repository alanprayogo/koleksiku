<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function showCategory()
    {
       // Ambil semua data kategori dari database
        $categories = Category::all();

        // Kirim data kategori ke view 'page.category'
        return view('page.category', compact('categories'));
    } // show category

    public function showAddCategory()
    {
        return view('page.add-category');
    } // show add category

    public function addCategory(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'category_code' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
        ]);

        // Buat dan simpan kategori baru
        $category = new Category();
        $category->category_code = $validatedData['category_code'];
        $category->category_name = $validatedData['category_name'];
        $category->save();

        // Tambahkan session flash untuk SweetAlert
        $request->session()->flash('success', 'Data kategori berhasil disimpan!');

        // Redirect kembali ke halaman form
        return redirect()->route('show-category');
    }

    public function showEditCategory()
    {
        return view('page.edit-category');
    } // show add category
}
