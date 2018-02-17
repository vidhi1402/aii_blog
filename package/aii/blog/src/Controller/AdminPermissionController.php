<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\AdminPermission;
use Aii\Blog\Models\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPermissionController extends BlogAdminController
{
    public function index()
    {
        $oAdminPermissions = AdminPermission::all();
        //  return ($oPermissions);
        $oAdminRoles = AdminRole::all();
        return view('blog::templates.administrator.admin_roles_permissions.admin-permissions-roles', compact('oAdminPermissions','oAdminRoles'));
    }

    public function AddAdminPermission(Request $oRequest)
    {
        $rules = array(
            'name' => 'required',
            'label' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oResponse = AdminPermission::create($oRequest->all());

        if ($oResponse) {
            session()->flash('msg', 'Admin Permissions Added');
        } else {
            session()->flash('msg', 'Admin Permissions Not Added');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }

    public function DeleteAdminPermission(AdminPermission $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Admin Permissions Deleted');
        } else {
            session()->flash('msg', 'Admin Permissions Not Deleted');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }

    public function EditAdminPermission(AdminPermission $id)
    {

        $oAdminPermissions = AdminPermission::all();
        $oAdminRoles = AdminRole::all();
        return view('blog::templates.administrator.admin_roles_permissions.admin-permissions-roles', compact('id', 'oAdminPermissions','oAdminRoles'));
    }

    public function UpdateAdminPermission(Request $oRequest)
    {
        $rules = array(
            'name' => 'required',
            'label' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oResponse = AdminPermission::where('id', $oRequest->selected_permission)->update(
            [   'name' => $oRequest->name,
                'label' => $oRequest->label,
            ]
        );

        if ($oResponse) {
            session()->flash('msg', 'Admin Permission Updated');
        } else {
            session()->flash('msg', 'Admin Permission Not Updated');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }
}
