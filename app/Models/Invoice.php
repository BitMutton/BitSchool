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
    const STATUS_PAID = 'paid';
    const STATUS_OVERDUE = 'overdue';

    public static function getStatuses()
    {
        return [
            self::STATUS_UNPAID,
            self::STATUS_PAID,
            self::STATUS_OVERDUE,
        ];
    }
}

