<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentRepliesController;
use App\Enums\TokenAbility;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function(){
    Route::post('login', 'login');
});

Route::middleware(['checkSuperAdminCode'])->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth:sanctum', 'ability:' . TokenAbility::ISSUE_ACCESS_TOKEN->value)->group(function () {
    Route::get('refreshToken', [RegisterController::class, 'refreshToken']);
});

// only superadmin
Route::middleware('auth:sanctum', 'checkRoles: 1', 'ability:' . TokenAbility::ACCESS_API->value)->group( function () {
    Route::get('userCategory', 'App\Http\Controllers\UserCategoryController@index');
    Route::get('userCategory/{userCategory}', 'App\Http\Controllers\UserCategoryController@show');
    Route::post('userCategory', 'App\Http\Controllers\UserCategoryController@store');
    Route::put('userCategory/{userCategory}', 'App\Http\Controllers\UserCategoryController@update');
    Route::delete('userCategory/{userCategory}', 'App\Http\Controllers\UserCategoryController@delete');

    Route::delete('users/{user}', 'App\Http\Controllers\UserController@delete');

    Route::delete('comment/{comment}', 'App\Http\Controllers\CommentController@delete');
    Route::delete('reply/{reply}', 'App\Http\Controllers\CommentRepliesController@delete');
});

// all users
Route::middleware('auth:sanctum', 'checkRoles: 1, 2, 3, 4, 5, 6', 'ability:' . TokenAbility::ACCESS_API->value)->group( function () {
    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::get('users/{user}', 'App\Http\Controllers\UserController@show');
    Route::put('users/{user}', 'App\Http\Controllers\UserController@update');

    Route::get('post', 'App\Http\Controllers\PostController@index');
    Route::get('post/{post}', 'App\Http\Controllers\PostController@show');
    Route::post('post', 'App\Http\Controllers\PostController@store');
    Route::put('post/{post}', 'App\Http\Controllers\PostController@update');
    Route::delete('post/{post}', 'App\Http\Controllers\PostController@delete');

    Route::post('like/{post}', 'App\Http\Controllers\LikeController@likePost');
    Route::post('unlike/{post}', 'App\Http\Controllers\LikeController@unlikePost');
    Route::post('listLikes/{post}', 'App\Http\Controllers\LikeController@listLikes');

    Route::post('comment/{post}', 'App\Http\Controllers\CommentController@makeComment');
    Route::post('listComments/{post}', 'App\Http\Controllers\CommentController@listComments');

    Route::post('follow/{user}', 'App\Http\Controllers\FollowController@follow');
    Route::post('unfollow/{user}', 'App\Http\Controllers\FollowController@unfollow');
    Route::post('listFollowers/{user}', 'App\Http\Controllers\FollowController@listFollowers');

    Route::post('reply/{comment}', 'App\Http\Controllers\CommentRepliesController@makeReply');
    Route::post('listReplies/{comment}', 'App\Http\Controllers\CommentRepliesController@listReplies');
});