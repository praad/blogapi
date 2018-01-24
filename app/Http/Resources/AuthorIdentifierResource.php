<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AuthorIdentifierResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = User::find($this->author);
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
        
        //return parent::toArray($request);
    }
}
