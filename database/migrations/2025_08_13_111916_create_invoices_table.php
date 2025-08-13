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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->unsignedBigInteger('fee_structure_id');
            $table->foreign('fee_structure_id')
                ->references('id')
                ->on('fee_structures')
                ->onDelete('cascade');

            $table->date('issue_date');
            $table->date('due_date');
            $table->string('status', 20);
        });

        // Add CHECK constraint for status values
        DB::statement("
            ALTER TABLE invoices 
            ADD CONSTRAINT chk_invoices_status 
            CHECK (status IN ('unpaid', 'paid', 'overdue'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

