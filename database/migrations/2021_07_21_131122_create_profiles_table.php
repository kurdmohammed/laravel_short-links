<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->unique()->constrained('users','id')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar')->nullable();
            $table->date('birthday');
            $table->string('mobile')->nullable();
            $table->string('country');
            $table->string('address')->nullable();
            $table->string('zip_code');
            $table->enum('gender',['male','female']);
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
        Schema::dropIfExists('profiles');
    }
}
