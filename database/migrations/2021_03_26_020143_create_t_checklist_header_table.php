<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTChecklistHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_checklist_header', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->BigInteger('template_id')->unsigned();
            $table->string('user_name');
            $table->BigInteger('branch_id')->unsigned();
            $table->string('student_name');
            $table->string('parent_name');
            $table->TEXT('signature');
            $table->timestamps();

            $table->foreign('template_id')->references('id')->on('m_templates')->onDelete('cascade');

            $table->foreign('branch_id')->references('id')->on('m_branch')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_checklist_header');
    }
}
