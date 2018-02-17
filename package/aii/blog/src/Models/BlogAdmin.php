<?php

namespace Aii\Blog\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BlogAdmin extends Authenticatable
{
    use Notifiable;
   // use AdminHasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','password_text'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','status','password_text'
    ];
    protected $primaryKey='id_blog_admin';
    protected $table = 'blog_admins';

}
