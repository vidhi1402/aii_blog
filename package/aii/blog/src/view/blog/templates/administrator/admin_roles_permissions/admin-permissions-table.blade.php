<div class="row">
    <div class="col-sm-6">
        <section class="panel">
            <header class="panel-heading">
                Admin Roles List
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="roles-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                             @foreach($oAdminRoles as $oRole)
                                <tr>
                                    <td>{{ $oRole->name }}</td>
                                    <td>{{ $oRole->label }}</td>
                                      <td> <a href="{{ route('blog.admin.admin_roles.edit',array( 'id' => $oRole->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                         <a href="{{ route('blog.admin.admin_roles.delete',array( 'id' => $oRole->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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
                    Admin Permissions List
                 <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="permissions-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Label</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OurTeamUItable">
                                 @foreach($oAdminPermissions as $oPermission)
                                    <tr>
                                        <td>{{ $oPermission->name }}</td>
                                        <td>{{ $oPermission->label }}</td>
                                         <td> <a href="{{ route('blog.admin.admin_permissions.edit',array( 'id' => $oPermission->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                             <a href="{{ route('blog.admin.admin_permissions.delete',array( 'id' => $oPermission->id)) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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




