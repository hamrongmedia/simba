<?php

namespace App\Policies;

use App\Admin;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(Admin $user, Post $post)
    {
        return in_array('view-post', $user->getActions());
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Admin  $user
     *
     * @return \Illuminate\Auth\Access\Response
     */
    public function create(Admin $user)
    {
        return in_array('create-post', $user->getActions())
        ? Response::allow()
        : Response::deny('Bạn không có quyền tạo bài viết');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(Admin $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Admin  $user
     * @param  \App\Models\Posts  $post
     *
     * @return \Illuminate\Auth\Access\Response

     */
    public function delete(Admin $user, \App\Models\Posts $post)
    {
        return in_array('delete-post', $user->getActions())
        ? Response::allow()
        : Response::deny('Bạn không có quyền xóa bài viết');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(Admin $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(Admin $user, Post $post)
    {
        //
    }
}