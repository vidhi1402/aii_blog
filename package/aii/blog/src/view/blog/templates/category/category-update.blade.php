<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('blog.category.update') }}">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Blog Category:</label> <br>
                    <select class=" chosen-select form-control"  id="fk_id_category" name="fk_id_category[]">
                        <option value="">-----------select category---------</option>
                        @foreach( $aCategory as $oCategory)
                            <option @if($oCategory->id_category == $id->fk_id_category ){{'selected'}}@endif  value="{{ $oCategory->id_category }}">
                                {{ $oCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                     <label  class="sr-input" for="exampleInputEmail1">Name:   EX.->category(Separate with space) </label>
                      <input class="form-control has-feedback-left" id="name" placeholder="Category Name"
                           name="name" value="{{ $id->name }}"
                           type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                  <label class="sr-input" for="exampleInputPassword2">Slug:   Ex.->paly-ball(Separate with dash(-) and Use LowerCase</label>

                    <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                           name="slug" value="{{ $id->slug }}" type="text">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id_category }}" name="selected_id" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


