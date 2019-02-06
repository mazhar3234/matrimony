<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblFamilyPartnerPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_partner_preference', function (Blueprint $table) {
            $table->increments('partner_id');
            $table->integer('user_id')->nullable();
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->tinyInteger('married_status')->nullable();
            $table->tinyInteger('body_type')->nullable();
            $table->tinyInteger('complexion')->nullable();
            $table->string('height')->nullable();
            $table->tinyInteger('smoking')->nullable();
            $table->tinyInteger('religion')->nullable();
            $table->tinyInteger('drink')->nullable();
            $table->tinyInteger('mother_tongue')->nullable();
            $table->tinyInteger('education')->nullable();
            $table->tinyInteger('occupation')->nullable();
            $table->tinyInteger('location')->nullable();
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
        Schema::dropIfExists('tbl_partner_preference');
    }
}
