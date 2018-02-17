<div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

        <li>
            <a @if(Request::route()->getName() == 'blog.dashboard.index') class="active"
               @endif href="{{route('blog.dashboard.index')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a @if(Request::route()->getName() == 'blog.category.index') class="active"
               @endif href="{{route('blog.category.index')}}">
                <i class="fa fa-sitemap"></i>
                <span>Category</span>
            </a>
        </li>

        <li>
            <a @if(Request::route()->getName() == 'blog.blog.index') class="active"
               @endif href="{{route('blog.blog.index')}}">
                <i class="fa fa-file-text"></i>
                <span>Blog</span>
            </a>
        </li>

       {{-- @can('manage_users')--}}
        <li class="sub-menu">

            <a @if(Request::route()->getName() == 'admin.admin_permissions.index'
            || Request::route()->getName() == 'admin.admin_user_roles.index'
              )
               class="active" @endif href="javascript:">
                <i class="fa fa-key"></i>
                <span>Administrator</span>
            </a>
            <ul class="sub">
                <li><a @if(Request::route()->getName() == 'blog.admin.admin_permissions.index') class="active"
                       @endif href="{{route('blog.admin.admin_permissions.index')}}"><i
                                class="fa fa-th-list"></i><span>Roles/Permissinos</span></a></li>
                <li><a @if(Request::route()->getName() == 'blog.admin.admin_user_roles.index') class="active"
                       @endif href="{{route('blog.admin.admin_user_roles.index')}}"><i
                                class="fa fa-th-list"></i><span>User/Roles</span></a></li>
                {{-- <li><a @if(Request::route()->getName() == 'blog.admin.admin_users.index') class="active"
                       @endif href="{{route('blog.admin.admin_users.index')}}"><i
                                class="fa fa-th-list"></i><span>Admin Users</span></a></li>--}}

            </ul>
        </li>
      {{--  @endCan--}}

    </ul>
    <!-- sidebar menu end-->
</div>