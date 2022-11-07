<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allocReceipt extends Model
{
    public function receipts()
    {
        return $this->belongsTo(Receipt::class, 'recId', 'id');
    }
}
