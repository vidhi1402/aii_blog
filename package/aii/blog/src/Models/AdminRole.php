<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $fillable= [ 'name','label'];

    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id';
    protected $table = 'blog_admin_roles';

    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class , 'blog_admin_permission_role' ,'fk_id_role' ,'fk_id_permission');
    }

    public function givePermissionTo(AdminPermission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
