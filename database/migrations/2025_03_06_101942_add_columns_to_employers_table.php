<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employers', function (Blueprint $table) {

            $table->decimal('leave_sold', 8, 2)->default(0)->nullable(); 
            $table->decimal('extra_time', 8, 2)->default(0)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
 
            $table->dropColumn('leave_sold');
            $table->dropColumn('extra_time');
        });
    }
};
