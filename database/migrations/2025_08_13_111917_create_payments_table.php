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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('cascade');

            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('payment_method', 20);
        });

        // Add CHECK constraint for payment_method values
        DB::statement("
            ALTER TABLE payments
            ADD CONSTRAINT chk_payments_method
            CHECK (payment_method IN ('cash', 'card', 'bank_transfer'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

