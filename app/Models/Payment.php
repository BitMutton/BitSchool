<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'invoice_id',
        'amount',
        'payment_date',
        'payment_method',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
    ];

    // Relationships
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    // Payment method constants
    const METHOD_CASH = 'cash';
    const METHOD_CARD = 'card';
    const METHOD_BANK_TRANSFER = 'bank_transfer';

    public static function getMethods(): array
    {
        return [
            self::METHOD_CASH,
            self::METHOD_CARD,
            self::METHOD_BANK_TRANSFER,
        ];
    }
}

