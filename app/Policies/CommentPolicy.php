<?php

namespace App\Policies;

use App\Comment;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;


    /**
     * Bất kỳ ai cũng có quyền đăng bình luận
     * Determine whether the user can create models.
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->activated();
    }

    /**
     * Determine whether the user can update the model.
     *  Chỉ có người đăng mới có quyền chỉnh sửa
     * @param  \App\Model\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->id == $comment->id;
    }

    /**
     * Người đăng bình luận hoặc admin có quyền xoá bình luân
     * Determine whether the user can delete the model.
     * @param  \App\Model\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->isAdmin() ||$user->id = $comment->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function restore(User $user, Comment $comment)
    {
        return false;
    }

}
