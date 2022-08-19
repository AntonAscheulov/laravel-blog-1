<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function published()
    {
        $this->is_published = 1;
        $this->save();
    }

    public function unpublished()
    {
        $this->is_published = 0;
        $this->save();
    }

    public function togglePublished()
    {
        if ($this->is_published == 0) {
            return $this->published();
        }
        return $this->unpublished();
    }

    public function scopePublished($query)
    {
        return $query->where('is_publish', 1);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('is_publish', 0);
    }
}
