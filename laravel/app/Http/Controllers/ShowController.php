<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

class ShowController extends Controller
{
    public function show($id) {     
        $books = Book::find($id);
        return view('user.chitiet',  compact('books'));;
    }

    public function category(){
        $category = Category::all();

        return view('user.chitiet' , compact('category'));
    }
}
