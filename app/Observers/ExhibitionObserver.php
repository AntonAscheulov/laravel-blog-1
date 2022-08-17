<?php

namespace App\Observers;
use App\Models\Exhibition;
use Illuminate\Support\Facades\Storage;
class ExhibitionObserver
{
    public function created(Exhibition $exhibition)
    {
        //
    }

    public function updated(Exhibition $exhibition)
    {
        //
    }

    public function deleted(Exhibition $exhibition)
    {
        //
    }

    public function restored(Exhibition $exhibition)
    {
        //
    }


    public function forceDeleted(Exhibition $exhibition)
    {
        if ($exhibition->image != Exhibition::NO_IMAGE && Storage::exists($exhibition->image)) {
            Storage::delete($exhibition->image);
        }
    }
}
