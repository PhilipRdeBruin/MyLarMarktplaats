<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biedings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('bod', 8, 2);
            $table->unsignedinteger('advertentie_id');
            $table->foreign('advertentie_id')->references('id')->on('advertenties');
            $table->unsignedinteger('koper_id');
            $table->foreign('koper_id')->references('id')->on('users');                        
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
        Schema::dropIfExists('biedings');
    }
}
