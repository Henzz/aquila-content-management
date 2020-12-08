<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;

class ApiController extends Controller
{
    public function list(){
        // calling the model datas to variable
        $post = Post::paginate(10);

        return PostResource::collection($post);
    }
}
