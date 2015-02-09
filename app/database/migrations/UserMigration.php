<?php

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Example migration for use with "novice"
 */
class UserMigration {
    function run()
    {
        Capsule::schema()->dropIfExists('API');

        Capsule::schema()->create('API', function($table) {
            $table->increments('SWAPI_id');
            $table->string('Name');
            $table->text('Other_names');
            $table->string('Title');
            $table->string('Birth');
            $table->string('Death');
            $table->string('Weapon');
            $table->string('Race');
            $table->string('Culture');
            $table->string('Gender');
            $table->string('Height');
            $table->string('Eye_color');
            $table->text('Realms_ruled');
        });
    }
}
