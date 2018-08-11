<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
 
        $posts = Post::paginate(4);
        $categories = Category::all();

        return view('front.home', compact('posts','categories'));
    }

    public function post($slug)
    {      
 
        $post = Post::findBySlug($slug);

        $comments = $post->comments()->whereIsActive(1)->get();
        //return $comments;
        $categories = Category::all();

        return view('post', compact('post', 'comments','categories'));
    }
}
