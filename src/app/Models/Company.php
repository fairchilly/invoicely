<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

    protected $fillable = [
        'id',
        'name',
        'street',
        'city',
        'stateProvince',
        'country',
        'zipPostal',
        'phone',
        'email',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
