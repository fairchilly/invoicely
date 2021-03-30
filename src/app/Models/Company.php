<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\Invoice;

class Company extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    protected $casts = [];

    protected $fillable = [
        'id',
        'invoice_id',
        'name',
        'street',
        'city',
        'stateProvince',
        'country',
        'zipPostal',
        'phone',
        'email',
    ];

    public function post()
    {
        return $this->belongsTo(Invoice::class);
    }
}
