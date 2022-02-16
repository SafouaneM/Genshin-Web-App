<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vision');
            $table->string('weapon');
            $table->string('nation');
            $table->string('affiliation');
            $table->integer('rarity');
            $table->string('constellation');
            $table->string('birthday')->nullable();
            $table->longText('description');
            $table->longText('skillTalents');
            $table->longText('passiveTalents');
            $table->longText('constellations');
            $table->longText('outfits')->nullable();
            $table->string('icon')->nullable();
            $table->string('portrait')->nullable();
            $table->string('gachaCard')->nullable();
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
        Schema::dropIfExists('characters');
    }
}
