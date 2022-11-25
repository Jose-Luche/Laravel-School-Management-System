<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    /*public function member()
    {
        return $this->belongsTo(User::class, 'memberId', 'id');
    }*/

    public function member()
    {
        return $this->belongsTo(Student::class, 'memberId', 'id');
    }

    public function ledger()
    {
        return $this->belongsTo(Ledger::class, 'ledgerId', 'id');
    }
}
