<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\CommentReplies;
use App\Models\Comment;
use App\Http\Resources\CommentRepliesResource;

class CommentRepliesController extends BaseController
{
    public function makeReply(Request $request, Comment $comment): JsonResponse{
        $reply = new CommentReplies;
        $reply->id_user = Auth::id();
        $reply->id_comment = $comment->id;
        $reply->reply = $request['reply'];
        $reply->save();

        return $this->sendResponse(new CommentRepliesResource($reply), 'Replied successfully.');
    }

    public function listReplies(Comment $comment): JsonResponse{
        $reply = CommentReplies::where('id_comment', $comment->id)->get();
        return $this->sendResponse(CommentRepliesResource::collection($reply), 'Data retrieved successfully.');
    }

    public function delete(CommentReplies $reply): JsonResponse{
        if(is_null($reply)){
            return $this->sendError('Data not found.');
        }
        $reply->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
