<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends BaseController
{
    public function index(): JsonResponse{
        $user = User::all();
        return $this->sendResponse(UserResource::collection($user), 'Data retrieved successfully.');
    }

    public function show(User $user): JsonResponse{
        if(is_null($user)){
            return $this->sendError('Data not found.');
        }
        return $this->sendResponse(new UserResource($user), 'Data retrieved successfully.');
    }

    public function update(Request $request, User $user): JsonResponse{
        // Check if the authenticated user is the same as the user being updated
        if($user->category->category_name !== 'superadmin' || Auth::id() !== $user->id) {
            return $this->sendError('Unauthorized.', ['error' => 'You can only edit your own profile.']);
        }
        
        $input = $request->all();
        if(is_null($user)){
            return $this->sendError('Data not found.');
        }

        $user->name = $input['name'];
        $user->nickname = $input['nickname'];
        $user->photo_url = $input['photo_url'];
        $user->description = $input['description'];
        $user->id_province = $input['id_province'];
        $user->id_regency = $input['id_regency'];
        $user->id_district = $input['id_district'];
        $user->id_village = $input['id_village'];
        $user->save();
        
        return $this->sendResponse(new UserResource($user), 'Data updated successfully.');
    }

    public function delete(User $user): JsonResponse{
        if(is_null($user)){
            return $this->sendError('Data not found.');
        }

        $user->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}
