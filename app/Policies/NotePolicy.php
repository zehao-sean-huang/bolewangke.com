<?php

namespace App\Policies;

use App\Note;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Note $note) {
        if ($user->role->name === 'admin') {
            return true;
        }
        if ($user->subscribedNotes->contains('id', $note->id)) {
            return true;
        }
        return false;
    }

    public function purchase(User $user, Note $note) {
        if ($user->role->name === 'admin') {
            return false;
        }
        if ($user->orderedNotes->contains('id', $note->id)) {
            return false;
        }
        if ($user->subscribedNotes->contains('id', $note->id)) {
            return false;
        }
        return true;
    }
}
