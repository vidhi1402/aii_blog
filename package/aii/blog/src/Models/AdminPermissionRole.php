<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPermissionRole extends Model
{
    protected $fillable= [ 'fk_id_permission','fk_id_role'];

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'blog_admin_permission_role';

    public function permission(){
        return $this->belongsTo('Aii\Blog\Models\AdminPermission', 'fk_id_permission', 'id'); // Model , primary_key , forien key
    }

    public function role(){
        return $this->belongsTo('Aii\Blog\Models\AdminRole', 'fk_id_role', 'id'); // Model , primary_key , forien key
    }
}
