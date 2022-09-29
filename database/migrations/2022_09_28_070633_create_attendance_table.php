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
      $table->foreign('employee_id')->references('unique')->on('hrmdolgu_personnel.plantilla');
      $table->datetime('am1')->nullable();
      $table->string('am1_code')->nullable();
      $table->datetime('am2')->nullable();
      $table->string('am2_code')->nullable();
      $table->datetime('pm1')->nullable();
      $table->string('pm1_code')->nullable();
      $table->datetime('pm2')->nullable();
      $table->string('pm2_code')->nullable();
      $table->datetime('undertime')->nullable();
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
