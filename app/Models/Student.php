<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //A Student HAS MANY RECEIPTS
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'memberId', 'id');
    }

    //A student has many bills
    public function bills()
    {
        return $this->hasMany(AccountStudentFee::class, 'student_id', 'id');
    }
}
