<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Resources\CommentResource;

class CommentController extends BaseController
{
    public function makeComment(Request $request, Post $post): JsonResponse{
        $comment = new Comment;
        $comment->id_user = Auth::id();
        $comment->id_post = $post->id;
        $comment->comment = $request['comment'];
        $comment->save();

        return $this->sendResponse(new CommentResource($comment), 'Commented successfully.');
    }

    public function listComments(Post $post): JsonResponse{
        $comment = Comment::where('id_post', $post->id)->get();
        return $this->sendResponse(CommentResource::collection($comment), 'Data retrieved successfully.');
    }

    public function delete(Comment $comment): JsonResponse{
        if(is_null($comment)){
            return $this->sendError('Data not found.');
        }
        $comment->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
