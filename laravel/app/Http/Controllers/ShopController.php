<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $categories = DB::table('categories')
        ->get();
        $query = DB::table('books');
        if ($request->has('cate')) {

            $cate = $request->input('cate');
            $query->where('category_id', $cate);
                }
            $books = $query->paginate(4);
        return view('user.shop', compact('books', 'categories'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', "%{$query}%")->get();
        return view('user.search', ['books' => $books]);
    }
}
