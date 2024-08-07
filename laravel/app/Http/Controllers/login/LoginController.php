<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }


    public function postLogin(Request $request){
        $data = $request->only('email', 'password');

        // $user = User::find();
        // kiểm tra
        
        if(Auth::attempt($data)){
            // Đăng nhập thành công

            if(Auth::user()->role == 'user'){
                return redirect()->route('user.home')->with('success', 'Chào mừng bạn đến với trang chủ');
            } else if (Auth::user()->role == 'admin'){
                return redirect()->route('admin.viewadmin')->with('success', 'Chào mừng bạn đến với trang Admin');
            }

        
        } else{
            return redirect()->back()->with('errorLogin', 'Email hoặc Password không chính xác');
        }
        

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
    return view('login.register');
    }

    // Register
    public function userRegister(Request $request){
        $data = $request->validate([
            'name' =>['required'],
            'username' =>['required','unique:users'],
            'avatar' =>['required'],
            'email' =>['required','email'],
            'password' => ['required', 'min:3','max:50']

        ]);



        if($request->hasFile('avatar')){
            $path_image = $request->file('avatar')->store('images', 'public');
            $data['avatar'] = $path_image;
        }


        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }       


    // edit user

    public function showuser(){
        $user = Auth::user();
        return view('user.showuser', compact('user'));  
    }

    public function updateuser(Request $request, User $id){
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
            return redirect()->route('user.home')->with('success', 'Cập nhật thành công');
    }

}
