<?php

Route::get('/test', function () {
    echo 'Hello from the  package!';
});


Route::group(['middleware' => 'web'], function () {

    Route::get('/register', ['as' => 'blog.auth.register', 'uses' => 'Aii\Blog\Controller\Auth\RegisterController@showRegistrationForm']);
    Route::get('/login', ['as' => 'blog.auth.login', 'uses' => 'Aii\Blog\Controller\Auth\LoginController@ShowLoginForm']);
    Route::post('/register', ['as' => 'blog.auth.register_blog', 'uses' => 'Aii\Blog\Controller\Auth\RegisterController@register']);
    Route::post('/login', ['as' => 'blog.auth.login_blog', 'uses' => 'Aii\Blog\Controller\Auth\LoginController@login']);
    Route::post('/logout', ['as' => 'blog.auth.logout', 'uses' => 'Aii\Blog\Controller\Auth\LoginController@logout']);
    /*Start::Dashboard route*/

    /*Start::Dashboard route*/
    Route::get('/dashboard', ['as' => 'blog.dashboard.index', 'uses' => 'Aii\Blog\Controller\DashboardController@Index']);
    /*End::Dashboard route*/

    /*Start ::Blog routes*/
    Route::get('/aii-blog', ['as' => 'blog.blog.index', 'uses' => 'Aii\Blog\Controller\BlogController@Index']);
    Route::post('/aii-blog/insert', ['as' => 'blog.blog.insert', 'uses' => 'Aii\Blog\Controller\BlogController@Insert']);
    Route::get('/aii-blog/{id}/edit', ['as' => 'blog.blog.edit', 'uses' => 'Aii\Blog\Controller\BlogController@GetBlog']);
    Route::post('/aii-blog/update', ['as' => 'blog.blog.update', 'uses' => 'Aii\Blog\Controller\BlogController@Update']);
    Route::get('/aii-blog/{id}/delete', ['as' => 'blog.blog.delete', 'uses' => 'Aii\Blog\Controller\BlogController@Delete']);
    Route::post('/aii-blog/update-status', ['as' => 'blog.blog.change_status', 'uses' => 'Aii\Blog\Controller\BlogController@UpdateStatus']);
    Route::post('/aii-blog/get-blog', ['as' => 'blog.blog.get_blog', 'uses' => 'Aii\Blog\Controller\BlogController@GetBlogDetail']);
    /*End ::Blog routes*/

    /*Start::category route*/
    Route::get('/category', ['as' => 'blog.category.index', 'uses' => 'Aii\Blog\Controller\CategoryController@Index']);
    Route::post('/category-insert', ['as' => 'blog.category.insert', 'uses' => 'Aii\Blog\Controller\CategoryController@Insert']);
    Route::get('/category/{id}/edit', ['as' => 'blog.category.edit', 'uses' => 'Aii\Blog\Controller\CategoryController@GetCategory']);
    Route::get('/category/{id}/delete', ['as' => 'blog.category.delete', 'uses' => 'Aii\Blog\Controller\CategoryController@Delete']);
    Route::post('/category/update', ['as' => 'blog.category.update', 'uses' => 'Aii\Blog\Controller\CategoryController@Update']);
    Route::post('/category/update-status', ['as' => 'blog.category.change_status', 'uses' => 'Aii\Blog\Controller\CategoryController@UpdateStatus']);
    /*End::Product-category route*/

    //ADMIN-ROLES-PERMISSION ROUTES
    /*Permission-roles Route Start*/
    Route::get('/admin-blog-permissions/roles', ['as' => 'blog.admin.admin_permissions.index', 'uses' => 'Aii\Blog\Controller\AdminPermissionController@index']);
    Route::post('/admin-blog-permissions', ['as' => 'blog.admin.admin_permissions.add', 'uses' => 'Aii\Blog\Controller\AdminPermissionController@AddAdminPermission']);
    Route::get('/admin-blog-permissions/{id}', ['as' => 'blog.admin.admin_permissions.delete', 'uses' => 'Aii\Blog\Controller\AdminPermissionController@DeleteAdminPermission']);
    Route::get('/admin-blog-permissions/{id}/edit', ['as' => 'blog.admin.admin_permissions.edit', 'uses' => 'Aii\Blog\Controller\AdminPermissionController@EditAdminPermission']);
    Route::post('/admin-blog-permissions/update', ['as' => 'blog.admin.admin_permissions.update', 'uses' => 'Aii\Blog\Controller\AdminPermissionController@UpdateAdminPermission']);
    //Roles
    Route::post('/admin-blog-roles', ['as' => 'blog.admin.admin_roles.add', 'uses' => 'Aii\Blog\Controller\AdminRoleController@AddAdminRole']);
    Route::get('/admin-blog-roles/{id}', ['as' => 'blog.admin.admin_roles.delete', 'uses' => 'Aii\Blog\Controller\AdminRoleController@DeleteAdminRole']);
    Route::get('/admin-blog-roles/{id}/edit', ['as' => 'blog.admin.admin_roles.edit', 'uses' => 'Aii\Blog\Controller\AdminRoleController@EditAdminRole']);
    Route::post('/admin-blog-roles/update', ['as' => 'blog.admin.admin_roles.update', 'uses' => 'Aii\Blog\Controller\AdminRoleController@UpdateAdminRole']);
    /*ADMIN-Permission-roles Route End*/

    /*ADMIN-user-roles Route Start*/
    Route::get('/admin-blog-user-roles', ['as' => 'blog.admin.admin_user_roles.index', 'uses' => 'Aii\Blog\Controller\AdminRoleUserController@index']);
    Route::post('/admin-blog-user-roles', ['as' => 'blog.admin.admin_user_roles.add', 'uses' => 'Aii\Blog\Controller\AdminRoleUserController@AddAdminRoleUser']);
    Route::get('/admin-blog-user-roles/{id}', ['as' => 'blog.admin.admin_user_roles.delete', 'uses' => 'Aii\Blog\Controller\AdminRoleUserController@DeleteAdminRoleUser']);
    Route::get('/admin-blog-user-roles/{id}/edit', ['as' => 'blog.admin.admin_user_roles.edit', 'uses' => 'Aii\Blog\Controller\AdminRoleUserController@EditAdminRoleUser']);
    Route::post('/admin-blog-user-roles/update', ['as' => 'blog.admin.admin_user_roles.update', 'uses' => 'Aii\Blog\Controller\AdminRoleUserController@UpdateAdminRoleUser']);
    //ADMIN-roles-permissions route
    Route::post('/admin-blog-role-permissions', ['as' => 'blog.admin.admin_role_permissions.add', 'uses' => 'Aii\Blog\Controller\AdminPermissionRoleController@AddAdminPermissionRole']);
    Route::get('/admin-blog-role-permissions/{id}', ['as' => 'blog.admin.admin_role_permissions.delete', 'uses' => 'Aii\Blog\Controller\AdminPermissionRoleController@DeleteAdminPermissionRole']);
    Route::get('/admin-blog-role-permissions/{id}/edit', ['as' => 'blog.admin.admin_role_permissions.edit', 'uses' => 'Aii\Blog\Controller\AdminPermissionRoleController@EditAdminPermissionRole']);
    Route::post('/admin-blog-role-permissions/update', ['as' => 'blog.admin.admin_role_permissions.update', 'uses' => 'Aii\Blog\Controller\AdminPermissionRoleController@UpdateAdminPermissionRole']);
    /*admin-roles-permissions Route End*/

    /*Start::Admin_Users route*/
    Route::get('/admin-blog-users', ['as' => 'blog.admin.admin_users.index', 'uses' => 'Aii\Blog\Controller\AdminUserController@Index']);
    Route::post('/admin-blog-users/insert', ['as' => 'blog.admin.admin_users.insert', 'uses' => 'Aii\Blog\Controller\AdminUserController@InsertAdminUser']);
    Route::get('/admin-blog-users/{id}/edit', ['as' => 'blog.admin.admin_users.edit', 'uses' => 'Admin\AdminUserController@GetAdminUser']);
    Route::get('/admin-blog-users/{id}/delete', ['as' => 'blog.admin.admin_users.delete', 'uses' => 'Aii\Blog\Controller\AdminUserController@DeleteAdminUser']);
    Route::post('/admin-blog-users/update', ['as' => 'blog.admin.admin_users.update', 'uses' => 'Aii\Blog\Controller\AdminUserController@UpdateAdminUser']);
    Route::post('/admin-blog-users/update-status', ['as' => 'blog.admin.admin_users.change_status', 'uses' => 'Aii\Blog\Controller\AdminUserController@UpdateAdminUserStatus']);
    /*End::menu route*/

});

