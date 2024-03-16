<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Like;
use App\Models\Post;
use App\Http\Resources\LikeResource;

class LikeController extends BaseController
{
    public function likePost(Request $request, Post $post): JsonResponse{
        $like = new Like;
        $like->id_user = Auth::id();
        $like->id_post = $post->id;
        $like->save();

        return $this->sendResponse($like, 'Post liked successfully.');
    }

    public function unlikePost(Request $request, Post $post): JsonResponse{
        $like = Like::where('id_user', Auth::id())
                    ->where('id_post', $post->id)
                    ->first();

        if ($like) {
            $like->delete();
            return $this->sendResponse([], 'Post unliked successfully.');
        }

        return $this->sendError('Like not found.');
    }

    public function countLikes(Post $post): JsonResponse{
        $likesCount = Like::where('id_post', $post->id)->count();
        return $this->sendResponse(['likes_count' => $likesCount], 'Data retrieved successfully.');
    }

    public function listLikes(Post $post): JsonResponse{
        $likes = Like::where('id_post', $post->id)->get();
        return $this->sendResponse(LikeResource::collection($likes), 'Data retrieved successfully.');
    }
}
