<form  method="post" role="form" action="{{ Route('blog.admin.admin_user_roles.update') }}" >
    {{csrf_field()}}

    <div class="col-md-12">
            <div class="form-group" >
              <label  class="sr-input" for="exampleInputEmail1">Admin:</label>


                 <input type="text" value="{{$id->admin->name}}" class="form-control m-bot15" name="fk_id_blog_admin" id="fk_id_blog_admin" readonly>

           </div>
        </div>
    <div class="col-md-12">
            <div class="form-group" >
              <label  class="sr-input" for="exampleInputEmail1">Admin Roles:</label>

                 <select class="form-control m-bot15" name="fk_id_role_admin" id="fk_id_role_admin">
                   <option value="">Select Role</option>

                   @foreach( $oAdminRoles as $role)
                         <option value="{{ $role->id }}" @if($role->id == $id->fk_id_role_admin){{"selected"}} @endif>{{ $role->name }} </option>
                   @endforeach
                </select>
           </div>
        </div>

  <div class="col-md-6">
    <div class="form-group">

    <button type="submit" name="selected_role" value="{{ $id->admin->id_blog_admin }}" class="btn btn-success">Update</button>
     </div>
  </div>
</form>



