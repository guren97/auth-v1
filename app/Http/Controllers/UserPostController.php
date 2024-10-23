<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Post;

class UserPostController extends Controller
{
    public function index(){
        $post = Post::paginate(10);
        return view("dashboard", compact("post"));
    }
}
