<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\Invoice;

class Customer extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    protected $casts = [];

    protected $fillable = [
        'id',
        'shippingName',
        'shippingStreet',
        'shippingCity',
        'shippingStateProvince',
        'shippingCountry',
        'shippingZipPostal',
        'shippingPhone',
        'shippingEmail',
        'billingName',
        'billingStreet',
        'billingCity',
        'billingStateProvince',
        'billingCountry',
        'billingZipPostal',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
