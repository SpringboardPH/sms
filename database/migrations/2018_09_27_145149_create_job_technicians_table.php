<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_technicians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technician_id')->unsigned();
            $table->integer('job_id')->unsigned();

            $table->foreign('technician_id')
                    ->references('id')
                    ->on('technicians')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('job_id')
                    ->references('id')
                    ->on('job_orders')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');


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
        Schema::dropIfExists('job_technicians');
    }
}
