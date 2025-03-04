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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->date('date_naissance');
            $table->string('adresse');
            $table->date('date_recrutement');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Freelance']);
            $table->decimal('salaire', 10, 2);
            $table->enum('statut', ['actif', 'inactif']);
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade'); 
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
