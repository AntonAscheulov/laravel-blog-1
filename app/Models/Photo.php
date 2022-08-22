<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'post_id',
    ];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
