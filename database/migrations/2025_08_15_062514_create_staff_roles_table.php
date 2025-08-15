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
        Schema::table('staff_roles', function (Blueprint $table) {
            // Add timestamps if they do not exist
            if (!Schema::hasColumn('staff_roles', 'created_at')) {
                $table->timestamps(); // adds both created_at and updated_at
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff_roles', function (Blueprint $table) {
            if (Schema::hasColumn('staff_roles', 'created_at')) {
                $table->dropTimestamps();
            }
        });
    }
};

