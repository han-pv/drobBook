<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Year;
use App\Models\Author;
use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books_index(Request $request)
    {
        // Formdan gelyanleri barlagdan geciryar
        // Meselem: categoryId null gelip bilyar, hokman integer bolmaly we 1-den baslamaly
        $request->validate([
            'categoryId' => ['nullable', "integer", "min:1"]
        ]);

        $f_category = $request->categoryId ? $request->categoryId : 0;

        $books = Book::when($f_category, function ($query) use ($f_category) {
            return $query->where('category_id', $f_category);
        })
            ->get();

        //Ahli catergorylary cekyar
        $categories = Category::get();
        $authors = Author::get();
        $publishers = Publisher::get();
        $languages = Language::get();
        $years = Year::get();

        // Views folder-daki Books->index.blade.php ugradyar
        return view('books.index')->with([
            'books' => $books,
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'languages' => $languages,
            'years' => $years,
        ]);
    }
}
