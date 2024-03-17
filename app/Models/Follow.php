<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_follower', 
        'id_followed'
    ];

    public function follower(){
        return $this->belongsTo(User::class, 'id_follower');
    }

    public function followed(){
        return $this->belongsTo(User::class, 'id_followed');
    }
}
