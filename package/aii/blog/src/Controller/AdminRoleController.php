<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\AdminPermission;
use Aii\Blog\Models\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRoleController extends BlogAdminController
{
    public function AddAdminRole(Request $oRequest)
    {
        $rules = array(
            'name' => 'required',
            'label' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oResponse = AdminRole::create($oRequest->all());
        if ($oResponse) {
            session()->flash('msg', 'Admin Role Added');
        } else {
            session()->flash('msg', 'Admin Role Not Added');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }

    public function DeleteAdminRole(AdminRole $id)
    {
        $oResponse = $id->delete();
        if ($oResponse) {
            session()->flash('msg', 'Admin Role Deleted');
        } else {
            session()->flash('msg', 'Admin Role Not Deleted');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }

    public function EditAdminRole(AdminRole $id)
    {
        $oAdminPermissions = AdminPermission::all();
        $oAdminRoles = AdminRole::all();
        return view('blog::templates.administrator.admin_roles_permissions.admin-permissions-roles', compact('id', 'oAdminPermissions', 'oAdminRoles'));
    }

    public function UpdateAdminRole(Request $oRequest)
    {
        $rules = array(
            'name' => 'required',
            'label' => 'required',
        );
        $this->validate($oRequest, $rules);

        $oResponse = AdminRole::where('id', $oRequest->selected_role)->update(
            [   'name' => $oRequest->name,
                'label' => $oRequest->label,
            ]
        );

        if ($oResponse) {
            session()->flash('msg', 'Admin Role Updated');
        } else {
            session()->flash('msg', 'Admin Role Not Updated');
        }

        return redirect()->route('blog.admin.admin_permissions.index');
    }
}
