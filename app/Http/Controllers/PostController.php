<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("title", "asc")->paginate(5);
        return view('Post/index', ['posts' => $posts]);
    }

    public function create()
    {   $categories = category::all();
        return view('Post/postCreate',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        Post::create($request->all());

        return back()->with("success","Post ajouté avec succès !");
    }

    public function edit($id)
    {
        $categories = category::all();
        $posts = Post::findOrFail($id);
        return view('Post/postEdit', ['posts' => $posts,'categories' => $categories]);
    }

    public function update($id, Request $request)
    {
        $posts = Post::findOrFail($id);
        $posts->update($request->all());
        return back()->with("success","Post modifié avec succès !");
    }


    public function delete(Post $posts){
        $posts->delete();
        return back()->with("successDelete","Post supprimé avec succès !");
    }
}
