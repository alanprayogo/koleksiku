<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function showBook()
    {
        return view('page.book');
    } // show book

    public function showAddBook()
    {
        return view('page.add-book');
    } // show add book

    public function showEditBook()
    {
        return view('page.edit-book');
    } // show edit book
}
