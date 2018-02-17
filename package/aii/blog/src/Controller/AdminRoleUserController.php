<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\BlogAdmin;
use Aii\Blog\Models\AdminPermission;
use Aii\Blog\Models\AdminPermissionRole;
use Aii\Blog\Models\AdminRole;
use Aii\Blog\Models\AdminUserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRoleUserController extends BlogAdminController
{
    public function index()
    {
        $oAdminPermissions =  AdminPermission::all();
        $oAdminRoles = AdminRole::all();
        $oAdminUserRoles = AdminUserRole::with('admin')->with('role')->get();
        $oAdminRolesPermissions = AdminPermissionRole::with('permission')->with('role')->get();
        $oAdmins = BlogAdmin::all();
        //dd($oUserRoles);
        return view('blog::templates.administrator.admin_user_roles.admin-user-roles', compact('oAdminUserRoles', 'oAdminRolesPermissions', 'oAdminRoles','oAdminPermissions','oAdmins'));
    }

    public function AddAdminRoleUser(Request $oRequest)
    {
        $rules = array(
           // 'fk_id_blog_admin' => 'required',
            'fk_id_role_admin' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oRes = AdminUserRole::where(['fk_id_blog_admin' => $oRequest->fk_id_blog_admin, 'fk_id_role_admin' => $oRequest->fk_id_role_admin])->first();
        if($oRes)
        {
            session()->flash('msg', 'Role Already Assigned');
        }
        else {
            $oResponse = AdminUserRole::create($oRequest->all());

            if ($oResponse) {
                session()->flash('msg', 'User Role Assigned');
            } else {
                session()->flash('msg', 'User Role Not Assigned');
            }
        }

        return redirect()->route('blog.admin.admin_user_roles.index');
    }

    /*    public function DeletePermission(Permission $id)
        {
            $oResponse = $id->delete();
            if ($oResponse) {
                session()->flash('msg', 'Permission Deleted');
            } else {
                session()->flash('msg', 'Permission Not Deleted');
            }

            return redirect()->route('admin.permissions.index');
        }*/

    public function EditAdminRoleUser($id)
    {
        $oAdminPermissions =  AdminPermission::all();
        $oAdminRoles = AdminRole::all();
        $oAdminUserRoles = AdminUserRole::with('admin')->with('role')->get();
        $oAdminRolesPermissions = AdminPermissionRole::with('permission')->with('role')->get();
        $oAdmins = BlogAdmin::all();
        $id = AdminUserRole::with('admin')->where('fk_id_blog_admin',$id)->first();
        return view('blog::templates.administrator.admin_user_roles.admin-user-roles'
            , compact('id', 'oAdminUserRoles', 'oAdminRolesPermissions', 'oAdminRoles','oAdminPermissions','oAdmins'));
    }

    public function UpdateAdminRoleUser(Request $oRequest)
    {
        $rules = array(
            'selected_role' => 'required',
            'fk_id_role_admin' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oResponse = AdminUserRole::where('fk_id_blog_admin', $oRequest->selected_role)->update(
            [
                'fk_id_role_admin' => $oRequest->fk_id_role_admin
            ]
        );

        if ($oResponse) {
            session()->flash('msg', 'User Role Updated');
        } else {
            session()->flash('msg', 'User Role Not Updated');
        }

        return redirect()->route('blog.admin.admin_user_roles.index');
    }
}
