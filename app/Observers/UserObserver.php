<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\SendCredentialsToTheNewUser;
use App\Notifications\SendNewPasswordToUpdatedUser;
use Illuminate\Support\Str;

class UserObserver
{
    public function created(User $user)
    {

    }

    public function creating(User $user)
    {
        if (! \App::runningInConsole()) {
            $password = Str::random(12);
            $user->password = $password;

            $user->notify(new SendCredentialsToTheNewUser($password));
        }
    }

    public function updating(User $user)
    {

        if($user->isDirty('email') && ! \App::runningInConsole())  {
            $user->email_verified_at = null;

            $user->sendEmailVerificationNotification();
        }

        if (request()->has('generate_new_password') && ! \App::runningInConsole()) {
            $newPassword = Str::random(12);
            $user->password = $newPassword;

            $user->notify(new SendNewPasswordToUpdatedUser($newPassword));
        }
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
