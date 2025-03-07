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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->string('reason'); 
            $table->enum('statut', ['Pending','Approved', 'Rejected'])->default('Pending');
            $table->enum('manager_approval', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('hr_approval', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
