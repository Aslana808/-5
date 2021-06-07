<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_places', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('town');
            $table->string('address');
            //დაბლა გაწერილი 2 ხაზი უზრუნველყოფს, რომ როდესაც users ბაზაში წაიშლება მონაცემი ავტომატურად წაიშლება მასთან
            // დაკავშირებული ველი birth_places ბაზაში
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->bigInteger('user_id')
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
        Schema::dropIfExists('birth_places');
    }
}
