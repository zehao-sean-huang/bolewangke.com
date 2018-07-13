<?php

namespace App\Policies;

use App\Course;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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

    public function view(User $user, Course $course) {
        if ($user->role->name === 'admin') {
            return true;
        }
        if ($user->role->name === 'vip') {
            return true;
        }
        if ($user->subscribedCourses->contains('id', $course->id)) {
            return true;
        }
        return false;
    }

    public function purchase(User $user, Course $course) {
        if ($user->role->name === 'admin') {
            return false;
        }
        if ($user->role->name === 'vip') {
            return false;
        }
        if ($user->orderedCourses->contains('id', $course->id)) {
            return false;
        }
        if ($user->subscribedCourses->contains('id', $course->id)) {
            return false;
        }
        return true;
    }
}
