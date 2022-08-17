<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory;
    use SoftDeletes;

    const NO_AVATAR = '/uploads/no-avatar.png';

    protected $fillable = [
        'artist_name',
        'artist_profession',
        'artist_avatar',
        'artist_full_description',
        'artist_short_description',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function exhibitions(){
        return $this->hasMany(Exhibition::class);
    }

    public function setArtistAvatarAttribute($value)
    {
        if ($value instanceof UploadedFile) {

            if ($this->artist_avatar !== self::NO_AVATAR && Storage::exists($this->artist_avatar)) {
                Storage::delete($this->artist_avatar);
            }

            $this->attributes['artist_avatar'] = $value->store('uploads');
        }
    }


    public function getArtistAvatarAttribute($value)
    {
        {
            if ($value !== null) {
                return $value;
            }
            return self::NO_AVATAR;
        }
    }
}
