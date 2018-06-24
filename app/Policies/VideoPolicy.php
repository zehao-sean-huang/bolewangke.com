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
        return $user->subscribedVideos->contains('id', $video->id);
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
