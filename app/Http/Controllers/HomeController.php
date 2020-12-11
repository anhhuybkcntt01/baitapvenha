<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public  function index(Request $request)
    {
//       dd($request->session()->all());
        $posts = DB::table('posts');
        $searchText = $request->input('search');
        if ($searchText){
            $isDate = Carbon::hasFormat($searchText,'Y-m-d');

            if($isDate){
                $posts->whereDate('created_at',$searchText);

            }else {
                $posts->where('title','LIKE',"%{$searchText}%")
                    ->orWhere('content','LIKE',"%{$searchText}%");

            }

        }
 $posts->paginate(10);
        dd($posts);

        return view('home',compact('posts'));
    }
}
