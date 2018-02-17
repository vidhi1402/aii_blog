<?php

namespace Aii\Blog\Controller\Auth;

use Aii\Blog\Controller\BlogAdminController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BlogAdminController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'showLoginForm', 'login']]);
    }

    public function ShowLoginForm()
    {
        return view('blog::auth.login');
    }
    public function logout(Request $request)
    {
       // dd( $request->session()->all());
        $this->guard()->logout();


        //$request->session()->flush();

        $request->session()->regenerate();

        return redirect()->route('blog.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('blog_admin');
    }
}
