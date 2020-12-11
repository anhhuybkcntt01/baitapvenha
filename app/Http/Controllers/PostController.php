<?php

namespace App\Http\Controllers;

//use http\Cookie;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $username = $request->cookie('username');
        return view('create',compact('username'));
    }

    public function storePost(Request $request)
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

    //CRUD Post chuẩn

    public function index()
    {
        $posts = Post::query()->paginate(15);
        return view('posts.index',compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::query()->findOrFail($id);

        return view('posts.edit',compact('post'));
    }

    public  function  update(Request $request, $id)
    {
        $post = Post::query()->findOrFail($id);

        $post->update($request->only('title','content','slug'));

        return redirect()->route('posts.index');
    }

    public  function  destroy($id)
    {
            Post::destroy($id);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request  $request)
    {
        $post = Post::query()->create($request->only('slug', 'title', 'content'));

        return redirect()->route('posts.index');

    }

}
