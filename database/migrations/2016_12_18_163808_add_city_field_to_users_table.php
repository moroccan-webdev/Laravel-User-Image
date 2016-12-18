<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function(Blueprint $table) {

      $table->string('phone')->nullable();
      $table->string('address')->nullable();
      $table->string('city')->nullable();
      $table->string('role')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    Schema::table('users', function(Blueprint $table) {

      $table->dropColumn('phone');
      $table->dropColumn('address');
      $table->dropColumn('city');
      $table->dropColumn('role');
    });
  }
}
