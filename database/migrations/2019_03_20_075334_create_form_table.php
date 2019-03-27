<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('leave_type')->nullable();
            $table->string('leave_cause')->nullable();
            $table->float('number_date_leave')->nullable();
            $table->datetime('date_leave')->nullable();
            $table->string('commented')->nullable();
            $table->boolean('approved')->nullable();
            $table->string('approve_by')->nullable();
            $table->string('responsible_work')->nullable();
            $table->string('attachment')->nullable();
            $table->dateTime('approve_datetime')->nullable();
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
        Schema::dropIfExists('form');
    }
}
