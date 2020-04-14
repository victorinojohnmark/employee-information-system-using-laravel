<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            // PERSONAL INFO
            $table->string('lastname', 250);
            $table->string('firstname', 250);
            $table->string('middlename', 250);
            $table->date('birthdate');
            $table->string('profile_image', 250);
            $table->string('signature_image', 250);
            // ID's
            $table->string('sss_id', 250);
            $table->string('tin_id', 250);
            $table->string('pagibig_id', 250);
            $table->string('philhealth_id', 250);
            // CONTACT INFO
            $table->string('address');
            $table->string('email', 250);
            $table->string('contact_no', 250);
            
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
        Schema::dropIfExists('people');
    }
}
