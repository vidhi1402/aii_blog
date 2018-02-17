<form method="post" role="form" action="{{ Route('blog.category.insert') }}">
    {{csrf_field()}}

    <div class="col-md-6">
        <div class="form-group{{--{{ $errors->has('name') ? ' has-error' : '' }}--}}">
            <label class="sr-input" for="exampleInputEmail1">Name: </label>

            <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name"
                   name="name" value="{{ old('name') }}" type="text">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="sr-input" for="exampleInputPassword2">Slug: Ex.->cold-drink(Separate with dash(-) and Use
                LowerCase</label>

            <input class="form-control has-feedback-left" id="inputSuccess2" placeholder="Slug"
                   name="slug" value="{{ old('slug') }}"
                   type="text">

        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>



