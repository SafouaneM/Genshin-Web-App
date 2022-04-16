<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_boss_ascension_id')->constrained('material_boss_ascension')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('material_common_ascension_id')->constrained('material_common_ascension')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('material_nation_ascension_id')->constrained('material_nation_ascension')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('material_character_ascension_id')->constrained('material_character_ascension')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('materials');
    }
}
