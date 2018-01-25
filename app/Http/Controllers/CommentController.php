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

    public function show(Post $post_id, Comment $comment_id)
    {
        //dd($comment_id);
        // Remove data wrapping:
        //CommentResource::withoutWrapping();
        return new CommentResource($comment_id);
    }

    public function delete(Post $post_id, Comment $comment_id)
    {
        $comment_id->delete();
        return response()->json(null, 204);
    }

    public function create(CommentRequest $request, Post $post_id)
    { 
        //$user_id = (Auth::id()) ? Auth::id() : 1;
        //$comment = Comment::create(['author' => $user_id , 'post_id' => $post_id->id, 'body' => $request->body]);
        // ????
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->author = Auth::id();
        $comment = $post_id->comments()->save($comment);
        return response()->json(new CommentResource($comment), 201);
    }

    public function update(CommentRequest $request, Post $post_id, Comment $comment_id)
    {
        //$user_id = (Auth::id()) ? Auth::id() : 1;
        $comment_id->update($request->all());
        return response()->json(new CommentResource($comment_id), 200);
    }

}
