<form method="post" role="form" action="{{ Route('blog.admin.admin_role_permissions.add') }}">
    {{csrf_field()}}

    <div class="col-md-12">
        <div class="form-group">
            <label class="sr-input" for="exampleInputEmail1">Blog Admin Roles-Permissions:</label>

            <select class="form-control m-bot15" name="fk_id_role" id="fk_id_role">
                <option value="">Select Role</option>

                @foreach( $oAdminRoles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="sr-input" for="exampleInputPassword2">Admin Permissions</label> <br>

            <select multiple="multiple" class="multi-select" id="fk_id_permission" name="fk_id_permission[]">
                @foreach( $oAdminPermissions as $permission)

                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach

            </select>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">

            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</form>



