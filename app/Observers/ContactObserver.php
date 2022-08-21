<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactNotification;

class ContactObserver
{
    public function created(Contact $contact)
    {
        $admins = User::where('is_admin', true)->get();
        foreach ($admins as $admin){
            $admin->notify(new ContactNotification($contact));
        }
    }

}
