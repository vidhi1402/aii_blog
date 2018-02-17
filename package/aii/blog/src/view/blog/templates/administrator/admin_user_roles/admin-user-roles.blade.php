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
                Roles-Permissions
               </header>
               <div class="panel-body">

                <div class="row">
                          @if(Request::route()->getName() == 'blog.admin.admin_role_permissions.edit')
                                @include('blog::templates.administrator.admin_user_roles.admin-role-permissions-update')
                          @else
                               @include('blog::templates.administrator.admin_user_roles.admin-role-permissions-content')
                           @endif

                </div>
             </div>
         </section>
     </div>


       <div class="col-lg-6">
           <section class="panel">
               <header class="panel-heading">
                User-Roles
               </header>
               <div class="panel-body">

                <div class="row">

                       @if(Request::route()->getName() == 'blog.admin.admin_user_roles.edit')
                             @include('blog::templates.administrator.admin_user_roles.admin-user-roles-update')
                       @else
                                @include('blog::templates.administrator.admin_user_roles.admin-user-roles-content')
                      @endif
                   </div>


             </div>
         </section>
     </div>
 </div>
       @include('blog::templates.administrator.admin_user_roles.admin-permissions-roles-user-table')


@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="{{ URL::to('blog/asset/css/bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('blog/asset/css/bootstrap-reset.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('blog/asset/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />

   <script type="text/javascript" language="javascript"
                         src="{{ URL::to('blog/asset/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
                 <script type="text/javascript" language="javascript"
                           src="{{ URL::to('blog/asset/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>

    <script type="text/javascript" language="javascript"
            src="{{ URL::to('blog/asset/plugin/advanced-datatable/media/js/jquery.dataTables-latest.js')}}"></script>
    <script type="text/javascript"
            src="{{ URL::to('blog/asset/plugin/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{ URL::to('blog/asset/js/common_utility_aii.js')}}"></script>



    <script>
        initDataTable_Custom('user-roles-table');
        initDataTable_Custom('role-permissions-table');
                $('#fk_id_permission').multiSelect();

    </script>

@endsection