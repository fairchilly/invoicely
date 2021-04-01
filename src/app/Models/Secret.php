<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Traits\Uuids;

class Secret extends Model
{
    use HasFactory, Uuids;

    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
