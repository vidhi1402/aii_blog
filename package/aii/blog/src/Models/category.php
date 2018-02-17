<?php

namespace Aii\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= ['name','slug'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_category';
    protected $table = 'aii_categories';
}
