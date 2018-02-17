<?php

namespace Aii\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BlogAdminController
{
    public function Index(){
        return view('blog::templates.dashboard.dashboard');
    }
}
