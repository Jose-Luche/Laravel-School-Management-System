<?php

namespace App\Http\Controllers\Backend\student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StProfileController extends Controller
{
    public function stPrView($id)
    {
        $student = Student::where('id', $id)->first();
        $receipts = [];
        /*if (Receipt::where('memberId', $id)->first()) {
            $receipts = Receipt::where('memberId', $id)->get();w_tx, w_tax
        }*/
        if ($student->receipts != null) {
            $receipts = $student->receipts;
        }

        $bills = [];
        if ($student->bills != null) {
            $bills = $student->bills;
        }


        //dd($prospect->receipts);
        return view('backend.members.profiles.viewProf', compact('student', 'receipts', 'bills'));
    }
}
