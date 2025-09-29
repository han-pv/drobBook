<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $categories = [
        //     'bilim',
        //     'taryh',
        //     'fantastika',
        //     'dokumental',
        // ];
        
        $categories = Category::get();

        $authors = [
            'Kerim G',
            'Gurbannazar E',
        ];

        return view('home')->with([
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }
}
