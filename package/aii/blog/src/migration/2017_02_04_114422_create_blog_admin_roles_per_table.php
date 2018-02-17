<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAdminRolesPerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasTable('blog_admin_roles')) {

            Schema::create('blog_admin_roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('label')->nullable();
                $table->timestamps();

            });
        }

        if ( ! Schema::hasTable('blog_admin_permissions')) {

            Schema::create('blog_admin_permissions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('label')->nullable();
                $table->timestamps();
            });
        }

        if ( ! Schema::hasTable('blog_admin_permission_role')) {

            Schema::create('blog_admin_permission_role', function (Blueprint $table) {
                $table->integer('fk_id_permission')->unsigned();
                $table->integer('fk_id_role')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_permission')
                    ->references('id')
                    ->on('blog_admin_permissions')
                    ->onDelete('cascade');

                $table->foreign('fk_id_role')
                    ->references('id')
                    ->on('blog_admin_roles')
                    ->onDelete('cascade');

                $table->primary(['fk_id_permission', 'fk_id_role']);

            });
        }

        if(! Schema::hasTable('blog_admin_user_role')) {
            Schema::create('blog_admin_user_role', function (Blueprint $table) {
                $table->integer('fk_id_role_admin')->unsigned();
                $table->integer('fk_id_admin')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_role_admin')
                    ->references('id')
                    ->on('blog_admin_roles')
                    ->onDelete('cascade');

                $table->foreign('fk_id_admin')
                    ->references('fk_blog_id_admin')
                    ->on('blog_admins')
                    ->onDelete('cascade');

                $table->primary(['fk_id_role_admin', 'fk_blog_id_admin']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_admin_roles');
        Schema::dropIfExists('blog_admin_permissions');
        Schema::dropIfExists('blog_admin_permission_role');
        Schema::dropIfExists('blog_admin_user_role');
    }
}
