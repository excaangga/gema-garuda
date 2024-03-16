<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 
        'id_post'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'id_post');
    }
}
