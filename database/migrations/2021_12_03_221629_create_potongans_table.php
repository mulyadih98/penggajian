<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("gaji_id");
            $table->string("jenis_potongan");
            $table->integer("jumlah");
            $table->timestamps();

            $table->foreign("gaji_id")->references("id")->on("gajis")->onDelete("cascade");
            $table->foreign("gaji_id")->references("id")->on("gajis")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potongans');
    }
}
