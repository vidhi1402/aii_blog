<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    protected $fillable= [ 'name','label'];

    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id';
    protected $table = 'blog_admin_permissions';

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class , 'blog_admin_permission_role' ,'fk_id_permission' ,'fk_id_role');
    }
}
