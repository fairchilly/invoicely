<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use App\Models\Invoice;

class Fee extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    protected $casts = [];

    protected $fillable = [
        'id',
        'invoice_id',
        'description',
        'value',
        'type',
        'rank',
    ];

    public function post()
    {
        return $this->belongsTo(Invoice::class);
    }
}
