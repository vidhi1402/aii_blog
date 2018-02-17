@extends('blog::layout.master-layout')

@section('styles')
        <!--dynamic table-->
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    @if(Request::route()->getName() == 'blog::category.edit')
                        Category Update
                    @else
                        Category
                    @endif
                </header>
                <div class="panel-body">

                    <div class="row">
                        @if(Request::route()->getName() == 'blog.category.edit')
                            @include('blog::templates.category.category-update')
                        @else
                            @include('blog::templates.category.category-content')

                        @endif

                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('blog::templates.category.category-info-table')

@endsection

@section('scripts')

    <script>
        initDataTable_Custom('category_info_table');
    </script>

    <script type="text/javascript">

        function changeStatus(this1, id) {
            if (confirm('STATUS cahnge?')) {
                var value;
                if ($(this1).val() == '{{config('constants.ACTIVE')}}') {
                    value = '{{config('constants.INACTIVE')}}';
                }
                else {
                    value = '{{config('constants.ACTIVE')}}'
                }
                var API_URL = "{{ route('blog.category.change_status') }}";
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
    </script>

@endsection