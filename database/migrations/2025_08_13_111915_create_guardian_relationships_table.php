<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guardian_relationships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->unsignedBigInteger('guardian_id');
            $table->foreign('guardian_id')
                ->references('id')
                ->on('guardians')
                ->onDelete('cascade');

            $table->string('relationship_type', 20);
        });

        // Add CHECK constraint for relationship_type
        DB::statement("
            ALTER TABLE guardian_relationships 
            ADD CONSTRAINT chk_relationship_type 
            CHECK (relationship_type IN ('father', 'mother', 'sibling', 'other'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardian_relationships');
    }
};

