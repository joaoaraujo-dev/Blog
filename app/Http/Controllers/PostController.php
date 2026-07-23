<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::paginate(10);

        return view("admin.posts", compact("posts"));
    }

    public function index_create(): View {
        $categories = Category::all();

        return view("admin.create_post", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "title" => 'required',
            "description" => 'required',
            "image" => 'required|image|mimes:jpg,png,jpeg',
            "category_id" => 'required',
            "text" => 'required'
        ]);

        $post = $request->all();

        $post["user_id"] = auth()->user()->id;
        $post["image"] = $request->image->store("images", "public");
        $post["slug"] = Str::slug($request->title);

        $post = Post::create($post);

        return redirect()->back()->with("success", "Postagem criada com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $posts)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $posts, int $id): RedirectResponse
    {
        $request->validate([
            "title" => 'required',
            "description" => 'required',
            "category_id" => 'required',
            "image" => 'required',
            "text" => 'required'
        ]);

        $post = $posts::findOrFail($id);

        $post->update($request->all());

        return redirect()->back()->with("success", "Postagem atualizada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $posts, int $id): RedirectResponse
    {
       $post = $posts::findOrFail($id);

       $post->delete();

       return redirect()->back()->with("success", "Postagem deletada com sucesso");
    }
}
