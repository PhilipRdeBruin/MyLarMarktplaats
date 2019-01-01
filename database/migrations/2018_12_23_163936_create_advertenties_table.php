<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertentiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertenties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_titel');
            $table->longText('ad_omschrijving');
            $table->unsignedinteger('rubriek_id');
            $table->foreign('rubriek_id')->references('id')->on('rubrieks');
            $table->unsignedinteger('verkoper_id');
            $table->foreign('verkoper_id')->references('id')->on('users');
            $table->decimal('prijs', 8, 2);
            $table->tinyinteger('b_bij_opbod');
            $table->tinyinteger('b_onder_vraagprijs');
            $table->tinyinteger('vis_email');
            $table->tinyinteger('vis_tel');
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
        Schema::dropIfExists('advertenties');
    }
}
