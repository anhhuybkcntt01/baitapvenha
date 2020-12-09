<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
       $slug = $request->slug;
       $title = $request->title;
       $description = $request->description;

       if(isset($slug) && isset($title) && isset($description)){
          return view('detail',compact('slug','title','description'));
       }else {
         return  redirect()->back()->with('message','Thiếu Input, mời nhập lại');
       }
    }
}
