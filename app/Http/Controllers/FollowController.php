<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\Follow;
use App\Models\User;
use App\Http\Resources\FollowResource;

class FollowController extends BaseController
{
    public function follow(Request $request, User $user): JsonResponse{
        if (Auth::id() == $user->id) {
            return $this->sendError('You cannot follow yourself.');
        }

        $follow = new Follow;
        $follow->id_follower = Auth::id();
        $follow->id_followed = $user->id;
        $follow->save();

        return $this->sendResponse(new FollowResource($follow), 'Followed successfully.');
    }

    public function unfollow(Request $request, User $user): JsonResponse{
        $follow = Follow::where('id_follower', Auth::id())
                    ->where('id_followed', $user->id)
                    ->first();

        if ($follow) {
            $follow->delete();
            return $this->sendResponse([], 'Unfollowed successfully.');
        }

        return $this->sendError('Follow record not found.');
    }

    public function listFollowers(User $user): JsonResponse{
        $followers = Follow::where('id_followed', $user->id)->get();
        return $this->sendResponse(FollowResource::collection($followers), 'Data retrieved successfully.');
    }
}
