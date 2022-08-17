<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Exhibition extends Model
{
    use HasFactory;
    use SoftDeletes;

    const NO_IMAGE = '/uploads/no-image.png';

    protected $fillable = [
        'image',
        'title',
        'description',
        'date_start',
        'date_end',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function setImageAttribute($value)
    {
        if ($value instanceof UploadedFile) {

            if ($this->image !== self::NO_IMAGE && Storage::exists($this->image)) {
                Storage::delete($this->image);
            }

            $this->attributes['image'] = $value->store('uploads');
        }
    }

    public function getImageAttribute($value)
    {
        {
            if ($value !== null) {
                return $value;
            }
            return self::NO_IMAGE;
        }
    }

    public function setArtist($id)
    {
        if ($id == null) {
            return;
        }
        $this->artist_id = $id;
        $this->save();
    }

    public function getArtistName()
    {
        if ($this->artist !== null) {
            return $this->artist->artist_name;
        }
        return 'Без автора';
    }
}
