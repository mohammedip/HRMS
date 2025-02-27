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
        Schema::table('departments', function (Blueprint $table) {
            $table->string('nom')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('responsable_id')->nullable()->constrained('employers')->onDelete('cascade');
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['responsable_id']); 
            $table->dropColumn(['nom', 'description', 'responsable_id']);
        });
    }
};
