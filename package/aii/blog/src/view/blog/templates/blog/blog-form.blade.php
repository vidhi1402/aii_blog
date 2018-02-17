<header class="panel-heading">
    {{config('constants.BLOG')}} Add
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" enctype="multipart/form-data" role="form" action="{{ Route('blog.blog.insert') }}">

            {{csrf_field()}}

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Blog Category:</label> <br>
                        <select class=" chosen-select form-control"  id="fk_id_category" name="fk_id_category">
                            <option value="">-----------select category---------</option>
                            @foreach( $aCategory as $oCategory)
                                <option @if($oCategory->id_category == old('fk_id_category')) {{"selected"}} @endif value="{{ $oCategory->id_category }}">
                                    {{ $oCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Title:</label>

                        <input class="form-control has-feedback-left" id="name" placeholder="Title"
                               name="title" value="{{ old('title') }}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Slug:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                               name="slug" value="{{ old('slug') }}" type="text">
                    </div>
                    <label class="sr-input" for="exampleInputEmail1" style="color: green">It should be separate with "-"
                        and in lowercase. Ex.,play ball = play-ball </label>
                </div>
            </div>
            <div class="col-md-12">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Date:</label>

                        <input class="form-control has-feedback-left" id="date" placeholder="yyyy-mm-dd"
                               name="date" value="{{ old('date') }}"
                               type="date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('post_by') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Post By:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="post by"
                               name="post_by" value="{{ old('post_by') }}" type="text">
                    </div>

                </div>
            </div>

            <!--Summernote start-->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            Blog Description
                        </header>
                        <div class="panel-body">
                            <textarea name="description" class="summernote">{{old('description')}}</textarea>
                        </div>
                    </section>
                </div>
            </div>
            <!--Summernote end-->

            <div class="col-md-12" style="text-align: center">
                <div class="form-group">
                    <button type="submit" value="" name="selected_id" class="btn btn-primary">
                        Add {{config('constants.BLOG')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



