<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function showCategory()
    {
        return view('page.category');
    } // show category

    public function showAddCategory()
    {
        return view('page.add-category');
    } // show add category

    public function showEditCategory()
    {
        return view('page.edit-category');
    } // show add category
}
