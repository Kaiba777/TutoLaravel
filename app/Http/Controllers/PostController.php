<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FormPostRequest;
use App\Http\Requests\BlogFilterRequest;

class PostController extends Controller
{

    public function create ()
    {
        $post = new Post();
        return view('blog.create',[
            'post' => $post
        ]);
    }

    public function store(FormPostRequest $request) 
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien été sauvegardé");
    }

    public function edit (Post $post)
    {
        return view('blog.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien été modifier");
    }

    public function index (BlogFilterRequest $request) : View 
    {
        $post = Post::find(5);
        $tags = $post->tags;
        

        
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        
        if ($post->slug != $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }

        return view('blog.show', [
            'post' => $post
        ]);
    }
}
