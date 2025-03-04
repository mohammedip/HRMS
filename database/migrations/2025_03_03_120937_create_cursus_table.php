<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursusTable extends Migration
{
    public function up()
    {
        Schema::create('cursus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
            $table->string('name');
            $table->string('contract_type');
            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->foreignId('emploi_id')->nullable()->constrained('emplois');
            $table->integer('progress')->default(0);
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursus');
    }
}

