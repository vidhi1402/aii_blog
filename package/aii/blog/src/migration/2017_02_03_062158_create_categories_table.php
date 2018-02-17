<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_categories')) {
            Schema::create('aii_categories', function (Blueprint $table) {
                $table->increments('id_category');
                $table->string('name', 50);
                $table->string('slug', 50);
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
        Schema::dropIfExists('aii_categories');
    }
}
