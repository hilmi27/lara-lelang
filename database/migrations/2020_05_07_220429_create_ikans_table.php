<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ikan');
            $table->string('kualitas');
            $table->string('ukuran');
            $table->integer('qty');
            $table->decimal('harga',10,2);
            $table->date('tgl_masuk');
            $table->string('wilayah_penangkapan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikan');
    }
}
