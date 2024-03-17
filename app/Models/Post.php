<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'tag',
        'content_text',
        'content_image_link'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
