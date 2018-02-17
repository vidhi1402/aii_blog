<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\BlogAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends BlogAdminController
{
    public function Index()
    {
        $aAdmin = BlogAdmin::all();
        return view('blog::templates.administrator.admin_users.admin-users',compact('aAdmin'));
    }

    /*Start::admin-users insert*/
    public function InsertAdminUser(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oResAdmin = BlogAdmin::create([
                'name' => $oRequest['name'],
                'email' => $oRequest['email'],
                'password' => bcrypt($oRequest['password']),
                'password_text' => $oRequest['password'],
            ]);

            if ($oResAdmin) {
                    session()->flash('msg', 'Admin User Added');
            } else {
                session()->flash('msg', 'Admin User Not Added');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('blog.admin.admin_users.index');
    }
    /*End::admin-users insert*/

    /*Start:: Get Admin User*/
    public function GetAdminUser(BlogAdmin $id)
    {
        $aAdmin = BlogAdmin::all();
        return view('blog::templates.administrator.admin_users.admin-users', compact('id', 'aAdmin'));
    }
    /*End:: Get Admin User*/

    /*Start::admin-users update*/
    public function UpdateAdminUser(Request $oRequest)
    {
        $aRules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        );

        $oValid = Validator::make($oRequest->all(), $aRules);
        if ($oValid->passes()) {

            $oResAdmin = BlogAdmin::where('id_admin',$oRequest->selected_admin)->update([
                'name' => $oRequest['name'],
                'email' => $oRequest['email'],
                'password' => bcrypt($oRequest['password']),
                'password_text' => $oRequest['password'],
            ]);

            if ($oResAdmin) {
                session()->flash('msg', 'Admin User Updated');
            } else {
                session()->flash('msg', 'Admin User Not Updated');
            }
        } else {
            return back()
                ->withErrors($oValid)
                ->withInput();
        }
        return redirect()->route('blog.admin.admin_users.index');
    }
    /*End::admin-users update*/

    /*Start::Update status Admin User*/
    public  function UpdateAdminUserStatus(Request $oRequest)
    {
        $oResponse = blogAdmin::where('id_blog_admin', $oRequest->id)->update([
            'status' => $oRequest->status,
        ]);
        if($oResponse) {
            session()->flash('msg','Status Changed');
            return response()->json(array('data' => $oResponse, 'status' => 1));
        }else{
            $oResponse = 'not found';
            session()->flash('msg','Status Not Changed');
            return response()->json(array('data' => $oResponse, 'status' => 0));
        }
    }
    /*End::Update status Admin User*/

    /*Start:: Delete menu */
    public function DeleteAdminUser(BlogAdmin $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Admin User Deleted');
        } else {
            session()->flash('msg', 'Admin User Not Deleted');
        }
        return redirect()->route('blog.admin.admin_users.index');
    }
    /*End:: Delete menu*/

}
