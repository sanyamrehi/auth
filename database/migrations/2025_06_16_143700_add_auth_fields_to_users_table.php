<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->after('email');
            $table->foreignId('country_id')->after('mobile');
            $table->foreignId('state_id')->after('country_id');
            $table->foreignId('city_id')->after('state_id');
            $table->text('address')->after('city_id');
            $table->enum('gender', ['male', 'female', 'other'])->after('address');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['mobile', 'country_id', 'state_id', 'city_id', 'address', 'gender']);
        });
    }
};
