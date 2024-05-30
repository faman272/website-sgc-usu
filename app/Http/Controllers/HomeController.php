<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Firefly\FilamentBlog\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $divisis = Divisi::all();
        return view('home', compact('posts', 'divisis'));
    }
}
