<header class="panel-heading">
    {{config('constants.BLOG')}} Update
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ Route('blog.blog.update') }}">

            {{csrf_field()}}

            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-input" for="exampleInputPassword2">Blog Category:</label> <br>
                    <select class=" chosen-select form-control"  id="fk_id_category" name="fk_id_category">
                        <option value="">-----------select category---------</option>
                        @foreach( $aCategory as $oCategory)
                            <option @if($oCategory->id_category == $id->fk_id_category) {{"selected"}} @endif  value="{{ $oCategory->id_category }}">
                                {{ $oCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">{{config('constants.BLOG')}} Title:</label>

                        <input class="form-control has-feedback-left" id="name" placeholder="title Name"
                               name="title" value="{{ old('title') }}{{$id->title}}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Slug:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="slug"
                               name="slug" value="{{ old('slug') }}{{$id->slug}}" type="text">
                    </div>
                    <label class="sr-input" for="exampleInputEmail1" style="color: green">It should be separate with
                        "-"
                        and in lowercase. Ex.,play ball = play-ball </label>

                </div>
            </div>
            <div class="col-md-12">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Date:</label>

                        <input class="form-control has-feedback-left" id="date" placeholder="yyyy-mm-dd"
                               name="date" value="{{$id->date}}"
                               type="date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('post_by') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Post By:</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="post by"
                               name="post_by" value="{{$id->post_by}}" type="text">
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
                            <textarea name="description" class="summernote">{{$id->description}}</textarea>
                        </div>
                    </section>
                </div>
            </div>


            <div class="col-md-12" style="text-align: center">
                <div class="form-group">
                    <button type="submit" value="{{ $id->id_blog }}" name="selected_id" class="btn btn-primary">
                        Update {{config('constants.BLOG')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



