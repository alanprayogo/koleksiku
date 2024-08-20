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
}
