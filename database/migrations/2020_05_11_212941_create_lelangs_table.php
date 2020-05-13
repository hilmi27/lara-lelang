<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelang', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ikan');
            $table->string('slug');
            $table->string('photo');
            $table->string('kualitas');
            $table->string('ukuran');
            $table->integer('qty');
            $table->decimal('harga_awal',20,2);
            $table->date('tgl_lelang');
            $table->enum('status',['not yet','on progress','done','cancel']);
            $table->string('pemenang');
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
        Schema::dropIfExists('lelang');
    }
}
