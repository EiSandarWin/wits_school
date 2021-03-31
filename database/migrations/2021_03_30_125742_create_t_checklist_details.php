<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTChecklistDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('t_checklist_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('checklist_id')->unsigned();
            $table->integer('listno');
            $table->tinyInteger('checkflag');
            $table->timestamps();

            $table->foreign('checklist_id')->references('id')->on('t_checklist_header')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_checklist_details');
    }
}
