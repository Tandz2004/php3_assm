<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.viewadmin');
    }

    // category
    public function category(){
        $category = Category::all();

        return view('admin.category' , compact('category'));
    }

    public function addCategory(){
        return view('admin.addcate');
    }

    public function addCate(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category');
    }

    public function deleteCate(Category $id){
        $id->delete();
        return redirect()->route('admin.category');

    }


    // product

    public function product(){
        $books = Book::all();
        return view('admin.products', compact('books'));
    }

    public function deletePro(Book $id){
        $id->delete();
        return redirect()->route('admin.product');
    }

    public function addProduct(){
        $category = Category::all();
        return view('admin.addproducts', compact('category'));
    }

    public function addPro(Request $request){

        $data = $request->except('thumbnail');
        $data['thumbnail'] = '';

        if($request->hasFile('thumbnail')){
            $path_image = $request->file('thumbnail')->store('images','public');
            $data['thumbnail'] = $path_image;
        }

       Book::query()->create($data);
        return redirect()->route('admin.product');
    }

    public function editPro(Book $id){
        $category = Category::all();
        return view('admin.editproducts', compact('id', 'category'));
    }

    public function updatePro(Request $request, Book $id){


        $data = $request->validate([
            'title' =>['required'],
            'author' =>['required'],
            'publisher' =>['required'],
            'publication' =>['required','email'],
            'price' => ['required', 'min:3','max:50'],
            'quantity' => ['required', 'min:3','max:50']

        ]);
        
        if($request->hasFile('thumbnail')){
            $path_image = $request->file('thumbnail')->store('images', 'public');
            $data['thumbnail'] = $path_image;
        }

        $id->update($data);
        return redirect()->route('admin.product');
    }

    public function user(){
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function deleteUser(User $id){
        $id->delete();
        return redirect()->route('admin.user');
    }

    public function addUser(){
        return view('admin.adduser');
    }


    public function addNewUser(Request $request){
        $data = $request->validate([
            'name' =>['required'],
            'username' =>['required','unique:users'],
            'avatar' =>['required'],
            'email' =>['required','email'],

        ]);



        if($request->hasFile('avatar')){
            $path_image = $request->file('avatar')->store('images', 'public');
            $data['avatar'] = $path_image;
        }


        User::query()->create($data);
        return redirect()->route('admin.user');;
    }

    public function editUser(User $id){
        return view('admin.edituser', compact('id'));
    }


    public function updateUser(Request $request, User $id){
        $data = $request->validate([
            'name' =>['required'],
            'username' =>['required','unique:users'],
            'email' =>['required','email'],
            ]);

            if($request->hasFile('avatar')){
                $path_image = $request->file('avatar')->store('images', 'public');
                $data['avatar'] = $path_image;
            }
            $id->update($data);
            return redirect()->route('admin.user');

        }
}

