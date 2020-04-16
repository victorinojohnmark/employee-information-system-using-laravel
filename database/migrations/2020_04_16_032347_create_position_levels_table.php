<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->integer('level_value');
            $table->timestamps();
        });

        // Insert Position Levels - least level_value are first in order
        DB::table('position_levels')->insert(
           [
            [
                'level_name' => 'Managing Director',
                'level_value' => 1
            ],
            [
                'level_name' => 'General Manager',
                'level_value' => 2
            ],
            [
                'level_name' => 'Financial Controller',
                'level_value' => 3
            ],
            [
                'level_name' => 'Senior Manager',
                'level_value' => 4
            ],
            [
                'level_name' => 'Manager',
                'level_value' => 5
            ],
            [
                'level_name' => 'Manager',
                'level_value' => 6
            ],
            [
                'level_name' => 'Supervisor',
                'level_value' => 7
            ],
            [
                'level_name' => 'Team Leader',
                'level_value' => 8
            ],
            [
                'level_name' => 'Staff',
                'level_value' => 9
            ],
            [
                'level_name' => 'Others',
                'level_value' => 10
            ]
           ]

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_levels');
    }
}
