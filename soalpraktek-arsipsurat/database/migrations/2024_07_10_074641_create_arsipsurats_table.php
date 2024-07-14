<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsipsurats', function (Blueprint $table) {
            $table->id();
            $table->string('nomorsurat');
            $table->foreignId('kategoris_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul');
            $table->dateTime('waktupengarsipan');
            $table->string('filesurat')->nullable();
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
        Schema::dropIfExists('arsipsurats');
    }
}
