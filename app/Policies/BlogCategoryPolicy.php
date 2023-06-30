<?php

namespace App\Policies;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy
{
    use HandlesAuthorization;

    /** php artisan make:policy NamePolicy --model=Name
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    // /**
    //  * Determine whether the user can view the category.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Category  $category
    //  * @return mixed
    //  */
    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-category'));
    }

    // /**
    //  * Determine whether the user can create categories.
    //  *
    //  * @param  \App\User  $user
    //  * @return mixed
    //  */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('blog_category_add');
    }

    // /**
    //  * Determine whether the user can update the category.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Category  $category
    //  * @return mixed
    //  */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('blog_category_edit');
    }

    // /**
    //  * Determine whether the user can delete the category.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Category  $category
    //  * @return mixed
    //  */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('blog_category_delete');
    }

    // /**
    //  * Determine whether the user can restore the category.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Category  $category
    //  * @return mixed
    //  */
    public function restore(User $user, BlogCategory $blog_category)
    {
        //
    }

    // /**
    //  * Determine whether the user can permanently delete the category.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Category  $category
    //  * @return mixed
    //  */
    public function forceDelete(User $user, BlogCategory $blog_category)
    {
        //
    }
}
