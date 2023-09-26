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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            
            //nullable->because when user logged with google he don't need to enter pass
            $table->string('password')->nullable();

            $table->string('google_id')->nullable();

            $table->string('from_google')->nullable();

            $table->string('facebook_id')->nullable();


            $table->bigInteger('mobile') ->nullable();
            $table->string('address') ->nullable();
         //   $table->boolean('is_logged')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
