<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Year;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {        
        $categories = Category::withCount('books')
        ->get();

        $books = Book::inRandomOrder()->first();

        // dd($categories);

        return view('home.index')->with([
            'categories' => $categories,
            'books' => $books,
        ]);
    }
}
