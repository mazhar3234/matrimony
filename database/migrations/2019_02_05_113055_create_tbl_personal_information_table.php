<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_personal_information', function (Blueprint $table) {
            $table->increments('personal_id');
            $table->integer('user_id')->nullable();
            $table->text('personal_details')->nullable();
            $table->tinyInteger('married_status')->nullable();
            $table->tinyInteger('mother_tongue')->nullable();
            $table->tinyInteger('body_type')->nullable();
            $table->tinyInteger('complexion')->nullable();
            $table->string('weight')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->tinyInteger('blood_group')->nullable();
            $table->tinyInteger('religion')->nullable();
            $table->tinyInteger('drink')->nullable();
            $table->tinyInteger('smoke')->nullable();
            $table->tinyInteger('location')->nullable();
            $table->tinyInteger('rassi')->nullable();
            $table->tinyInteger('education')->nullable();
            $table->text('education_details')->nullable();
            $table->tinyInteger('occupation')->nullable();
            $table->text('occupation_details')->nullable();
            $table->string('annual_income')->nullable();
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
        Schema::dropIfExists('tbl_personal_information');
    }
}
