<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cursus', function (Blueprint $table) {
            $table->decimal('salaire', 10, 2);
        });
    }

    public function down()
    {
        Schema::table('cursus', function (Blueprint $table) {
            $table->dropColumn('salaire'); 
        });
    }
};
