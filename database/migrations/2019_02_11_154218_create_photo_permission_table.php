<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_permission', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('permission')->nullable()->comment('1=Public,2=Private');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_permission');
    }
}
