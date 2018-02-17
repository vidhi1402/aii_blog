<form  method="post" role="form" action="{{ Route('blog.admin.admin_permissions.update') }}" enctype="multipart/form-data">
    {{csrf_field()}}

   <div class="col-md-12">
           <div class="form-group{{--{{ $errors->has('name') ? ' has-error' : '' }}--}}" >
             <label  class="sr-input" for="exampleInputEmail1">Name:</label>

              <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name"
                     name="name" value="{{ $id->name}}" type="text">
          </div>
       </div>
       <div class="col-md-12">
           <div class="form-group">
              <label class="sr-input" for="exampleInputPassword2">Label:</label>

              <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="Label"
                     name="label" value="{{ $id->label }}"
                     type="text">

            </div>
      </div>

  <div class="col-md-6">
    <div class="form-group">

    <button type="submit" name="selected_permission" class="btn btn-success" value="{{ $id->id }}">Update</button>
     </div>
  </div>
</form>



