<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Post;
use App\Category;
use App\Comment;

class AdminController extends Controller
{	
 
    public function index()
    {	
    	$postsCount = Post::count();
    	$categoriesCount = Category::count();
    	$commentsCount = Comment::count();
 
    	return view('admin.index',compact('postsCount','categoriesCount','commentsCount'));
    }
}
