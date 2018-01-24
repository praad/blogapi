<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\User;
use App\Comment;
use App\Http\Resources\UserResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentCollectionResource;

class PostResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'author' =>  new UserResource(User::find($this->author)),
            //'author' =>  new UserResource(User::find(1)),
            //'author' => new UserResource::collection(User::all()),
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at,
            //'comments' => new CommentResourceCollection(Comment::all()),
            //'comments' => new CommentResource(Comment::find($this->id)),
            //'comments' => new CommentResource(Comment::find(4)),
            'comments' => $this->comments,
            'updated_at' => $this->updated_at,
        ];
    }
}

