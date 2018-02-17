<div class="row">
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
               Blog Admin Role-Permission List
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="role-permissions-table">
                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                               @foreach($oAdminRolesPermissions as $oRolePer)
                                  <tr>
                                     <td>{{ $oRolePer->role->name }}</td>
                                    <td>{{ $oRolePer->permission->name }}</td>
                                      <td> <a href="{{ route('blog.admin.admin_role_permissions.edit',array( 'id' =>$oRolePer->role->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                  </td>
                                  </tr>

                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                 Blog Admin User-Role List
                 <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="user-roles-table">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OurTeamUItable">
                                @foreach($oAdminUserRoles as $oUserRole)
                                  <tr>
                                     <td>{{ $oUserRole->admin->name }}</td>
                                    <td>{{ $oUserRole->role->name }}</td>
                                      <td> <a href="{{ route('blog.admin.admin_user_roles.edit',array( 'id' =>$oUserRole->admin->id_blog_admin)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                  </td>
                                  </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
</div>




