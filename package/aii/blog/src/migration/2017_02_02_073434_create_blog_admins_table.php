<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blog_admins')) {
            Schema::create('blog_admins', function (Blueprint $table){
                $table->increments('id_blog_admin');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('password_text');
                $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');
                $table->rememberToken();
                $table->timestamps();
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
        Schema::dropIfExists('blog_admins');
    }
}
