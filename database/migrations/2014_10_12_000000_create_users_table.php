<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gebr_naam', 100)->unique();;

            $table->string('voornaam');
            $table->string('initialen', 10);
            $table->string('tussenv', 10);
            $table->string('achternaam');

            $table->string('straatnaam');
            $table->string('huisnr', 10);
            $table->string('postcode', 10);
            $table->string('woonplaats');

            $table->string('telefoon', 20);
            $table->string('mobiel', 20);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('wachtwoord_sh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
