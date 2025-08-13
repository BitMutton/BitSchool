<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'student_id',
        'fee_structure_id',
        'issue_date',
        'due_date',
        'status',
        'total_amount',
        'paid_amount',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'total_amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function feeStructure()
    {
        return $this->belongsTo(FeeStructure::class, 'fee_structure_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'invoice_id');
    }

    // Status options
    const STATUS_UNPAID = 'unpaid';
    const STATUS_PARTIAL = 'partial';
    const STATUS_PAID = 'paid';
    const STATUS_OVERDUE = 'overdue';

    public static function getStatuses()
    {
        return [
            self::STATUS_UNPAID,
            self::STATUS_PARTIAL,
            self::STATUS_PAID,
            self::STATUS_OVERDUE,
        ];
    }

    // Helper methods
    public function isPaid(): bool
    {
        return $this->status === self::STATUS_PAID;
    }

    public function isOverdue(): bool
    {
        return $this->status === self::STATUS_OVERDUE;
    }

    public function isPartial(): bool
    {
        return $this->status === self::STATUS_PARTIAL;
    }

    public function updateStatus()
    {
        if ($this->paid_amount >= $this->total_amount) {
            $this->status = self::STATUS_PAID;
        } elseif ($this->paid_amount > 0 && $this->paid_amount < $this->total_amount) {
            $this->status = self::STATUS_PARTIAL;
        } elseif ($this->due_date && $this->due_date->isPast()) {
            $this->status = self::STATUS_OVERDUE;
        } else {
            $this->status = self::STATUS_UNPAID;
        }

        $this->save();
    }
}

