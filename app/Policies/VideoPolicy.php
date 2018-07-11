<?php

namespace App\Policies;

use App\User;
use App\Video;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function view(User $user, Video $video)
    {
        if ($video->public) {
            return true;
        }
        if ($user->subscribedVideos->contains('id', $video->id)) {
            return true;
        }
        foreach ($user->subscribedCourses as $course) {
            if ($course->videos->contains('id', $video->id)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can purchase the video
     *
     * @param \App\User $user
     * @param \App\Video $video
     * @return mixed
     */
    public function purchase(User $user, Video $video)
    {
        if ($video->public) {
            return false;
        }
        if ($user->orderedVideos->contains('id', $video->id)) {
            return false;
        }
        if ($user->subscribedVideos->contains('id', $video->id)) {
            return false;
        }
        foreach ($user->orderedCourses as $course) {
            if ($course->videos->contains('id', $video->id)) {
                return false;
            }
        }
        foreach ($user->subscribedCourses as $course) {
            if ($course->videos->contains('id', $video->id)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Determine whether the user can create videos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function update(User $user, Video $video)
    {
        //
    }

    /**
     * Determine whether the user can delete the video.
     *
     * @param  \App\User  $user
     * @param  \App\Video  $video
     * @return mixed
     */
    public function delete(User $user, Video $video)
    {
        //
    }
}
