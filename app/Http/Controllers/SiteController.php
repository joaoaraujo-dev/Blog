<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        $posts = Post::with("category")->paginate(10);
        $categories = Category::all();

        return view("index", compact("posts", "categories"));
    }

    public function post(string $slug): View
    {

        $post = Post::where("slug", $slug)->firstOrFail();
        $comments = Comment::where("post_id", $post->id)->with("user")->get();

        return view("post", compact("post", "comments"));
    }

    public function search(Request $request): View
    {
        $value_search = $request->search;

        $posts = Post::when($value_search, function ($query) use ($value_search) {
            return $query->where("title", "LIKE", "%" . $value_search . "%");
        })->paginate(10);

        return view("index", compact("posts"));
    }

    public function categories(int $id): View
    {
        $posts = Post::where("category_id", $id)->paginate(10);
        $category = Category::find($id);

        return view("categories", compact("posts", "category"));
    }
}
