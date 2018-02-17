<?php

namespace Aii\Blog\Controller;

use Aii\Blog\Models\BlogAdmin;
use Aii\Blog\Models\AdminPermission;
use Aii\Blog\Models\AdminPermissionRole;
use Aii\Blog\Models\AdminRole;
use Aii\Blog\Models\AdminUserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPermissionRoleController extends BlogAdminController
{
    public function AddAdminPermissionRole(Request $oRequest)
    {
        $flag = 0;
        $rules = array(
            'fk_id_role' => 'required',
            'fk_id_permission' => 'required',
        );
        $this->validate($oRequest, $rules);


        for ($i = 0; $i < count($oRequest->fk_id_permission); $i++) {
            $oAdminPermissionRole = new AdminPermissionRole();

            $oAlready = AdminPermissionRole::where('fk_id_role', $oRequest->fk_id_role)
                ->where('fk_id_permission', $oRequest->fk_id_permission[$i])->first();

            if (!$oAlready) {

                $oAdminPermissionRole['fk_id_role'] = $oRequest->fk_id_role;
                $oAdminPermissionRole['fk_id_permission'] = $oRequest->fk_id_permission[$i];
                $oResponse = $oAdminPermissionRole->save();

                if ($oResponse) {
                    $flag = 0;
                } else {
                    $flag = 1;
                }
            } else {
                $flag = 2;
            }
        }
        if ($flag == 0) {
            session()->flash('msg', 'Admin Role-Permissions Added');
        } else if ($flag == 2) {
            session()->flash('msg', 'Admin Role-Permissions already exist');
        } else {
            session()->flash('msg', 'Admin Role-Permissions Not Added');
        }


        return redirect()->route('blog.admin.admin_user_roles.index');
    }


    public function EditAdminPermissionRole($id)
    {

        $oAdminPermissions = AdminPermission::get();
        $oAdminRoles = AdminRole::get();
        $oAdminUserRoles = AdminUserRole::with('admin')->with('role')->get();
        $oAdminRolesPermissions = AdminPermissionRole::with('permission')->with('role')->get();
        $oAdminRolePers = AdminPermissionRole::where('fk_id_role', $id)->get();
        $oAdmins = BlogAdmin::all();

        foreach ($oAdminRolePers AS $key => $value) {
            $givenPermissions[] = $value["fk_id_permission"];
        }
        return view('blog::templates.administrator.admin_user_roles.admin-user-roles', compact('id', 'oAdminPermissions', 'oAdminRoles','oAdmins', 'oAdminUserRoles', 'oAdminRolesPermissions', 'oAdminRolePers', 'givenPermissions'));
    }

    public function UpdateAdminPermissionRole(Request $oRequest)
    {
        $flag = 0;
        $rules = array(
            'fk_id_role' => 'required',
            'fk_id_permission' => 'required',
        );
        $this->validate($oRequest, $rules);

        $flag = $this->__deleteIfNotIn($oRequest);

        /*  if($flag == 0)
          {
        */      $oResult = $this->__updatePermissions($oRequest);
        if ($oResult == 0) {
            session()->flash('msg', 'Admin Role-Permissions Updated');
        } else {
            session()->flash('msg', 'Admin Role-Permissions Not Updated');
        }

        /* }
         else if($flag == 2 )
         {
             session()->flash('msg', 'Error : RolePermissions Not Deleted');
         }*/

        return redirect()->route('blog.admin.admin_user_roles.index');
    }

    private function __deleteIfNotIn(Request $oRequest)
    {
        $flag = 0 ;

        $oResponse = AdminPermissionRole::whereNotIn('fk_id_permission', $oRequest->fk_id_permission )->where('fk_id_role' , $oRequest->fk_id_role)->delete();

        if ($oResponse != null){
            $flag = 0;
        } else {
            $flag = 2;
        }

        return $flag;
    }

    private function __updatePermissions(Request $oRequest)
    {
        $flag = 0;
        for($i=0 ; $i<count($oRequest->fk_id_permission);$i++)
        {
            $oResponse = AdminPermissionRole::firstOrCreate(['fk_id_role' => $oRequest->fk_id_role ,
                'fk_id_permission' => $oRequest->fk_id_permission[$i] ]);

            if ($oResponse) {
                $flag = 0;
            } else {
                $flag = 1;
            }
        }

        return $flag;
    }
}
