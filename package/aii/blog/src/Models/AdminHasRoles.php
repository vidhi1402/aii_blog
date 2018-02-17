<?php

namespace Aii\Blog\Models;
use Illuminate\Database\Eloquent\Model;

trait AdminHasRoles {

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class,'blog_admin_user_role','fk_id_blog_admin','fk_id_role_admin');
    }

    /**
     * Assign the given role to the user.
     *
     * @param  string $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            AdminRole::whereName($role)->firstOrFail()
        );
    }

    /**
     * Determine if the user has the given role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        // print($this->roles());

        return !! $role->intersect($this->roles)->count();
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     * @return boolean
     */
    public function hasPermission(AdminPermission $permission)
    {
        return $this->hasRole($permission->roles);
    }
}