<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->tinyInteger('sex')->comment('1=Male,2=Female');
            $table->string('dob')->nullable();
            $table->tinyInteger('member_type')->default('1')->comment('1=free,2=starter,3=standard,4=pro');
            $table->tinyInteger('role')->default('2')->comment('1=Admin,2=User');
            $table->timestamp('last_login')->nullable();
            $table->tinyInteger('verified')->default('0')->comment('0=not verified,1=verified');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
