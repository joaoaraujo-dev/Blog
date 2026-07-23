<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function MakeComment(Request $request, string $title): RedirectResponse {
        $post = Post::where("title", $title)->firstOrFail();
      
        $comment = $request->only("comment");
        $comment["post_id"] = $post->id;
        $comment["user_id"] = auth()->id();

        Comment::create($comment);

        return redirect()->back()->with("sucesss", "Comentário enviado com sucesso");
    }
}
