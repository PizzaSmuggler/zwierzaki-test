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
        Schema::create('voievodeships', function (Blueprint $table) {
            $table->id();
            $table->string('name',length: 45);
            $table->timestamps();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger('voievodeship_id')->nullable();
            $table->foreign('voievodeship_id')->references('id')->on('voievodeships');
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
            $table->dropForeign('cities_voievodeship_id_foreign');
            $table->dropColumn('voievodeship_id');
        });
        Schema::dropIfExists('voievodeships');
    }
};
