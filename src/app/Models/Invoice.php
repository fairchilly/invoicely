<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Fee;
use App\Models\Item;

class Invoice extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    protected $casts = [
        'issued_date' => 'date',
        'due_date' => 'date',
    ];

    protected $fillable = [
        'id',
        'invoice_number',
        'issued_date',
        'due_date',
        'comments',
    ];

    // Helpers
    public function getSubtotalAttribute()
    {
        $subtotal = $this->items->sum(function ($item) {
            return $item->units * $item->pricePerUnit;
        });

        return $subtotal;
    }

    public function getTotalAttribute()
    {
        $subtotal = $this->subtotal;
        $feeTotal = $this->fees->sum(function ($fee) use ($subtotal) {
            if ($fee->type == 'percentage') {
                $amount = $subtotal * ($fee->value / 100);
            } else {
                $amount = $fee->value;
            }

            return $amount;
        });

        return $subtotal + $feeTotal;
    }

    // Relationships
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
