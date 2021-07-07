<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTChecklistDetailsTable extends Migration
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
            $table->BigInteger('m_template_id')->unsigned();
            $table->BigInteger('m_template_details_id')->unsigned();
            $table->tinyInteger('checkflag');

            $table->foreign('checklist_id')->references('id')->on('t_checklist_header')->onDelete('cascade');
            $table->foreign('m_template_details_id')->references('id')->on('m_template_details')->onDelete('cascade');
            $table->foreign('m_template_id')->references('id')->on('m_templates')->onDelete('cascade');

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
        Schema::dropIfExists('t_checklist_details');
    }
}
