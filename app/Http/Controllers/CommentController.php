<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Comment;
use App\Post;
use App\Http\Resources\CommentResource as CommentResource;
use App\Http\Resources\CommentResourceCollection as CommentResourceCollection;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function index() 
    {
        return new CommentResourceCollection(Comment::paginate(1));
    }

    public function show($post_id, $comment_id)
    {
        // Remove data wrapping:
        //CommentResource::withoutWrapping();
        $comment = Comment::findOrFail($comment_id);
        return new CommentResource($comment);
    }

    public function delete($post_id, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();
        return response()->json(null, 204);
    }

    public function create(CommentRequest $request, Post $post_id)
    {
        
        //dd($post_id);
        //$comment = $post->comment()->save();
     
        
        // Mukodik:
        $user_id = (Auth::id()) ? Auth::id() : 1;
        //$comment = Comment::create(['author' => $user_id , 'post_id' => $post_id, 'body' => $request->body]);
        $comment = Comment::create(['author' => $user_id , 'post_id' => $post_id->id, 'body' => $request->body]);
        return response()->json($comment, 201);
    }

    public function update(CommentRequest $request, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->update($request->all());
        //return $comment;
        return response()->json($comment, 200);
    }

}
