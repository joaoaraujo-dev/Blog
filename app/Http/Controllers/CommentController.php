<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function makeComment(Request $request, string $slug): RedirectResponse
    {
        $post = Post::where("slug", $slug)->firstOrFail();
        $validated = $request->validate([
            "comment" => ["required", "string"],
        ]);

        $post->comments()->create([
            "comment" => $validated["comment"],
            "user_id" => $request->user()->id,
        ]);

        return redirect()->back()->with("success", "Comentário enviado com sucesso");
    }
}
