<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Post;
use App\Http\Resources\PostResource as PostResource;
use App\Http\Resources\PostsResource as PostsResource;
use App\Http\Resources\PostResourceCollection as PostResourceCollection;

class PostController extends Controller
{

    //
    public function index()
    {
        //return Post::all();
        return new PostResourceCollection(Post::paginate(1));
    }    
    
    /*
    public function show($id)
    {
        $post = Post::find($id);
        //if (!$post) {
        //    return ('Post Not Found');
        //}
        // Return a single post
        return new PostResource(Post::find($id));
    }
    */

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        return new PostResource($post);
    }

    public function delete($post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();
        return response()->json(null, 204);
    }

    public function create(PostRequest $request)
    {
        //return Post::create($request->only);
        //$user_id = (Auth::id()) ? Auth::id() : 1;
        $post = Post::create($request->all());
        //$post->author_id = $
        return response()->json($post, 201);
    }

    public function update(PostRequest $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

}
