<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\UserCategory;
use App\Http\Resources\UserCategoryResource;

class UserCategoryController extends BaseController
{
    public function index(): JsonResponse{
        $userCategory = UserCategory::all();
        return $this->sendResponse(UserCategoryResource::collection($userCategory), 'Data retrieved successfully.');
    }

    public function show(UserCategory $userCategory): JsonResponse{
        if(is_null($userCategory)){
            return $this->sendError('Data not found.');
        }
        return $this->sendResponse(new UserCategoryResource($userCategory), 'Data retrieved successfully.');
    }

    // roles:
    // 1 superadmin
    // 2 pusat
    // 3 provinsi
    // 4 kabupaten/kota
    // 5 desa/kelurahan
    // 6 person
    public function store():JsonResponse {
        UserCategory::create([
            'category_name' => 'superadmin',
        ]);
        UserCategory::create([
            'category_name' => 'pusat',
        ]);
        UserCategory::create([
            'category_name' => 'provinsi',
        ]);
        UserCategory::create([
            'category_name' => 'kabupaten/kota',
        ]);
        UserCategory::create([
            'category_name' => 'desa/kelurahan',
        ]);
        UserCategory::create([
            'category_name' => 'person',
        ]);
        return $this->sendResponse([], 'Data created successfully.');
    }

    public function update(Request $request, UserCategory $userCategory): JsonResponse{
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_name' => 'required',
        ]);
        if(is_null($userCategory)){
            return $this->sendError('Data not found.');
        }
        if($validator->fails()){
            return $this->sendError('Validation error.', $validator->errors());
        }

        $userCategory->category_name = $input['category_name'];
        $userCategory->save();
        
        return $this->sendResponse(new UserCategoryResource($userCategory), 'Data updated successfully.');
    }

    public function delete(UserCategory $userCategory): JsonResponse{
        if(is_null($userCategory)){
            return $this->sendError('Data not found.');
        }

        $userCategory->delete();

        return $this->sendResponse([], 'Data deleted successfully.');
    }
}