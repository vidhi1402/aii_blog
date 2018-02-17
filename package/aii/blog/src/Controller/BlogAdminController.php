<?php

namespace Aii\Blog\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogAdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function  __construct()
   {
        $this->middleware('blog_admin');
   }
}
