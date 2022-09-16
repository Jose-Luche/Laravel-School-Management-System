<?php

namespace App\Models;

use App\Models\FeeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeAmount extends Model
{
    public function fee_category()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id', 'id');
    }
}
