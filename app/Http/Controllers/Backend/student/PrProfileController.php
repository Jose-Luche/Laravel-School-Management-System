<?php

namespace App\Http\Controllers\Backend\student;

use App\Models\Receipt;
use App\Models\Prospect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrProfileController extends Controller
{
    public function prProfView($id)
    {
        $prospect = Prospect::where('id', $id)->first();
        $receipts = [];
        /*if (Receipt::where('memberId', $id)->first()) {
            $receipts = Receipt::where('memberId', $id)->get();w_tx, w_tax
        }*/
        if ($prospect->receipts != null) {
            $receipts = $prospect->receipts;
        }


        //dd($prospect->receipts);
        return view('backend.student.prospects.profiles.viewProf', compact('prospect', 'receipts'));
    }

    public function prProfEdit($id)
    {
        $editData = Prospect::findOrFail($id);
        return view('backend.student.prospects.profiles.editProf', compact('editData'));
    }
}
