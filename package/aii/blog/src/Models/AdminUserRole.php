<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserRole extends Model
{
    protected $fillable= [ 'fk_id_role_admin','fk_id_blog_admin'];

    protected $hidden = ['created_at','updated_at'];

    protected $table = 'blog_admin_user_role';

    public function admin()
    {
        return $this->belongsTo('Aii\Blog\Models\BlogAdmin', 'fk_id_blog_admin' , 'id_blog_admin'); // Model , primary_key , forien key
    }
    public function role()
    {
        return $this->belongsTo('Aii\Blog\Models\AdminRole' , 'fk_id_role_admin','id'); // Model , primary_key , forien key
    }
}
