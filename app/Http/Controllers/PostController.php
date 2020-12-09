<?php

namespace App\Http\Controllers;

//use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $username = $request->cookie('username');
        return view('create',compact('username'));
    }

    public function store(Request $request)
    {
        $slug = $request->slug;
        $title = $request->title;
        $description = $request->description;

        if (isset($slug) && isset($title) && isset($description)) {
            return view('detail', compact('slug', 'title', 'description'));
        } else {
            return redirect()->back()->with('message', 'Thiếu Input, mời nhập lại');
        }
    }


    public function checkLogin(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (isset($name) && isset($password)) {
            $user = DB::table('user_demo')->where('name', $name)->where('password', $password)->first();
            if (isset($user)){
               Cookie::queue('username', $name, 1);
                Session::push('users',$name);
                return  redirect()->route('post.create');
            }else {
                return redirect()->route('login')->with('message', 'Tên đăng nhập hoặc mật khẩu chưa chính xác');
            }
        } else {
            return redirect()->route('login')->with('message', 'Điền thiếu thông tin');
        }
    }
}
