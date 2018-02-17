<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAiiBlogMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blog_master')) {
            Schema::create('aii_blog_master', function (Blueprint $table) {
                $table->increments('id_blog');
                $table->unsignedInteger('fk_id_category');
                $table->string('title',100)->index();
                $table->string('slug',100)->index();
                $table->date('date');
                $table->string('post_by');
                $table->longText('description');
                $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');
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
        Schema::dropIfExists('aii_blog_master');
    }
}
