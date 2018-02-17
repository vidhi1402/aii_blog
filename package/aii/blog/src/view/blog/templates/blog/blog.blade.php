@extends('blog::layout.master-layout')

@section('styles')
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">

                @if(Request::route()->getName() == 'blog.blog.index')

                    @include('blog::templates.blog.blog-form')

                @elseif(Request::route()->getName() == 'blog.blog.edit')

                    @include('blog::templates.blog.blog-update-form')

                @else
                    @include('blog::templates.blog.blog-form')
                @endif

            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    {{config('constants.BLOG')}} list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">

                        @include('blog::templates.blog.blog-table')

                    </div>
                </div>
            </section>
        </div>
    </div>




@endsection

@section('scripts')

    <script>
        initDataTable_Custom('blog_info_table');
        $(".chosen-select").chosen({disable_search_threshold: 12});
    </script>

    <script type="text/javascript">

        jQuery(document).ready(function(){

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
        });

        function changeStatus(this1, id) {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == '{{config('constants.ACTIVE')}}') {
                    value = '{{config('constants.INACTIVE')}}';
                }
                else {
                    value = '{{config('constants.ACTIVE')}}';
                }
                var API_URL = "{{ route('blog.blog.change_status') }}";
                $.ajax({
                    url: API_URL,
                    type: 'POST',
                    data: {'status': value, 'id': id},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        console.log(JSON.stringify(data, null, 4));

                        if (data.status == 1) {
                            location.reload();
                        }
                        else {
                            console.log("error");
                        }
                    },
                    error: function (data) {
                        alert('server unavailable');
                    }
                });
            }
        }

        // for multiple imagage
        function viewBlog(id) {
            var API_URL = "{{ route('blog.blog.get_blog') }}";
            $.ajax({
                url: API_URL,
                type: 'POST',
                data: {'id': id},
                async: false,
                dataType: 'json',
                success: function (data) {
                    console.log(JSON.stringify(data, null, 4));

                    if (data.status == 1) {
                        $('#modal_blog').modal('show');
                        $('#blog_Detail').html(data.html);
                    }
                    else {
                        console.log("error");
                    }
                },
                error: function (data) {
                    alert('server unavailable' + data);
                }
            });
        }

    </script>

@endsection