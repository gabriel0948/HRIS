<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('attendance', function (Blueprint $table) {
      $table->id();
      $table->integer('employee_id');
      $table->foreign('employee_id')->references('unique')->on('plantilla');
      $table->date('leave_date')->nullable();
      $table->string('am1_code')->nullable();
      $table->time('am1')->nullable();
      $table->string('am2_code')->nullable();
      $table->time('am2')->nullable();
      $table->string('pm1_code')->nullable();
      $table->time('pm1')->nullable();
      $table->string('pm2_code')->nullable();
      $table->time('pm2')->nullable();
      $table->integer('undertime');
      $table->string('remarks')->nullable();
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
    Schema::dropIfExists('attendance');
  }
};
