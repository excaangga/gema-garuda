<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class CommentReplies extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'id_comment',
        'reply'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comment(){
        return $this->belongsTo(Comment::class, 'id_comment');
    }
}
