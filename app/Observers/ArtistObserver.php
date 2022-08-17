<?php

namespace App\Observers;

use App\Models\Artist;
use Illuminate\Support\Facades\Storage;

class ArtistObserver
{
    public function created(Artist $artist)
    {
        //
    }

    public function updated(Artist $artist)
    {
        //
    }

    public function deleted(Artist $artist)
    {
        //
    }

    public function restored(Artist $artist)
    {
        //
    }

    public function forceDeleted(Artist $artist)
    {
        if ($artist->artist_avatar != Artist::NO_AVATAR && Storage::exists($artist->artist_avatar)) {
            Storage::delete($artist->artist_avatar);
        }
    }
}
