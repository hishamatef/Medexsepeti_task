<?php

namespace Modules\Permission\Policies;


use App\Models\User;

trait MainPolicy
{
    public function viewAny(User $user)
    {
        return static::can($user,'List ');
    }

    public function view(User $user, $model)
    {
        return static::can($user,'Show ');
    }

    public function create(User $user)
    {
        return static::can($user,'Create ');
    }

    public function update(User $user, $model)
    {
        return static::can($user,'Update ');
    }

    public function delete(User $user, $model)
    {
        return static::can($user,'Delete ');
    }

    public function restore(User $user, $model)
    {
        return static::can($user,'Delete ');
    }

    public function forceDelete(User $user, $model)
    {
        return false;
    }

    /** CUSTOM */
    private static function can($user,$permission){
        return $user->can($permission.static::$permissionsKey);
    }
}
