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
            'q' => ['nullable', 'string'],
            'categoryId' => ['nullable', "integer", "min:1"],
            'publisherId' => ['nullable', "integer", "min:1"],
            'yearId' => ['nullable', "integer", "min:1"],
        ]);

        $f_q = $request->q ? $request->q : null;
        $f_category = $request->categoryId ? $request->categoryId : 0;
        $f_publisher = $request->publisherId ? $request->publisherId : 0;
        $f_year = $request->yearId ? $request->yearId : 0;

        $books = Book::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('description', 'like', '%' . $f_q . '%');
            });
        })
            ->when($f_category, function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->when($f_publisher, function ($query) use ($f_publisher) {
                return $query->where('publisher_id', $f_publisher);
            })
            ->when($f_year, function ($query) use ($f_year) {
                return $query->where('year_id', $f_year);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

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
            'f_q' =>  $f_q,
            'f_category' =>  $f_category,
            'f_publisher' =>  $f_publisher,
            'f_year' =>  $f_year,
        ]);
    }
}
