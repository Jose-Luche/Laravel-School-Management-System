<?php

namespace App\Models;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prospect extends Model
{


    public function year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    /** A PROSPECT HAS MANY RECEIPTS **/
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'memberId', 'id');
    }
}
