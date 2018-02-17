<form method="post" role="form" action="{{ Route('blog.admin.admin_user_roles.add') }}">
    {{csrf_field()}}

    <div class="col-md-12">
        <div class="form-group">
            <label class="sr-input" for="exampleInputEmail1">Admins:</label>

            <select class="form-control m-bot15" name="fk_id_blog_admin" id="fk_id_blog_admin">
                <option value="">Select Admin</option>

                @foreach( $oAdmins as $admin)
                    <option value="{{ $admin->id_blog_admin}}">{{ $admin->name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="sr-input" for="exampleInputEmail1">Admin Roles:</label>

            <select class="form-control m-bot15" name="fk_id_role_admin" id="fk_id_role_admin">
                <option value="">Select Role</option>

                @foreach( $oAdminRoles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }} </option>
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



