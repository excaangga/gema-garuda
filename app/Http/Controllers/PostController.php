<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends BaseController
{
    public function index(): JsonResponse{
        $post = Post::all();
        return $this->sendResponse(PostResource::collection($post), 'Data retrieved successfully.');
    }

    public function show(Post $post): JsonResponse{
        if(is_null($post)){
            return $this->sendError('Data not found.');
        }
        return $this->sendResponse(new PostResource($post), 'Data retrieved successfully.');
    }

    public function store(Request $request):JsonResponse {
        $input = $request->all();
        $validator = Validator::make($input, [
            'content_text' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }
        
        $post = new Post;
        $post->id_user = Auth::id();
        $post->tag = $input['tag'];
        $post->content_text = $input['content_text'];
        $post->content_image_link = $input['content_image_link'];
        $post->save();
        return $this->sendResponse(new PostResource($post), 'Data created successfully.');
    }

    public function delete(Post $post): JsonResponse{
        if(is_null($post)){
            return $this->sendError('Data not found.');
        }
        $post->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
