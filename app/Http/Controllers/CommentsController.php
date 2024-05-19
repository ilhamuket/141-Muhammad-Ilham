<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TmDataArticle;
use App\Models\CommentArticle;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request, TmDataArticle $article)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new CommentArticle();
        $comment->article_id = $article->id;
        $comment->user_id = Auth::id();
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(CommentArticle $comment)
    {
        // You can implement edit functionality here if needed
    }

    public function update(Request $request, CommentArticle $comment)
    {
        // You can implement update functionality here if needed
    }

    public function destroy(CommentArticle $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
