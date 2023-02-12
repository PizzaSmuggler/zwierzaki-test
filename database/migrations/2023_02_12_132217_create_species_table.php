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
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name',length: 45);
            $table->timestamps();
        });
        Schema::table('breeds', function (Blueprint $table) {
            $table->unsignedBigInteger('species_id')->nullable();
            $table->foreign('species_id')->references('id')->on('species');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->dropForeign('breeds_species_id_foreign');
            $table->dropColumn('species_id');
        });
        Schema::dropIfExists('species');
    }
};
