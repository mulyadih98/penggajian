<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->bigInteger("gaji_pokok");
            $table->bigInteger("uang_transport");
            $table->bigInteger("uang_makan");
            $table->bigInteger("bonus");
            $table->bigInteger("lembur");
            $table->bigInteger("total_gaji");
            $table->bigInteger("diterima");
            $table->date("periode");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gajis');
    }
}
