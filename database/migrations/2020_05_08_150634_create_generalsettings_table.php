<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('favicon');
            $table->string('logo');
            $table->string('title');
            $table->string('bg_title');
            $table->string('banner_mid');
            $table->text('address')->nullable();;
            $table->text('phone')->nullable();;
            $table->text('email')->nullable();;
            $table->string('link_fb')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('link_tw')->nullable();
            $table->string('link_web')->nullable();
            $table->string('maps');
            $table->text('footer');
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
        Schema::dropIfExists('generalsettings');
    }
}
