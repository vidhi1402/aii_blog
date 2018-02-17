<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable= ['fk_id_category','title','slug','date','post_by','description'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_blog';
    protected $table = 'aii_blog_master';
}
