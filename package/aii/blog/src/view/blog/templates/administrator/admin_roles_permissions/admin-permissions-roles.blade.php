@extends('blog::layout.master-layout')
@section('styles')
        <!--dynamic table-->
<link href="{{ URL::to('blog/asset/plugin/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet"/>
<link href="{{ URL::to('blog/asset/plugin/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ URL::to('blog/asset/plugin/data-tables/DT_bootstrap.css')}}"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Blog Admin Roles
                </header>
                <div class="panel-body">

                    <div class="row">
                        @if(Request::route()->getName() == 'blog.admin.admin_roles.edit')
                            @include('blog::templates.administrator.admin_roles_permissions.admin-roles-update')
                        @else
                            @include('blog::templates.administrator.admin_roles_permissions.admin-roles-content')
                        @endif
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Blog Admin Permissions
                </header>
                <div class="panel-body">

                    <div class="row">
                        @if(Request::route()->getName() == 'blog.admin.admin_permissions.edit')
                            @include('blog::templates.administrator.admin_roles_permissions.admin-permissions-update')
                        @else
                            @include('blog::templates.administrator.admin_roles_permissions.admin-permissions-content')
                        @endif

                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('blog::templates.administrator.admin_roles_permissions.admin-permissions-table')

@endsection

@section('scripts')
    <script type="text/javascript" language="javascript"
            src="{{ URL::to('blog/asset/plugin/advanced-datatable/media/js/jquery.dataTables-latest.js')}}"></script>
    <script type="text/javascript"
            src="{{ URL::to('blog/asset/plugin/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{ URL::to('blog/asset/js/common_utility_aii.js')}}"></script>

    <script>
        initDataTable_Custom('roles-table');
        initDataTable_Custom('permissions-table');
    </script>
@endsection