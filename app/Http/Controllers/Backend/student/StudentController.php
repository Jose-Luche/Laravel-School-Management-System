<?php

namespace App\Http\Controllers\Backend\student;

use App\Models\Student;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function stdView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        //search options tied to the search form
        //$data['year_id'] = StudentYear::orderBy('id', 'asc')->first()->id;
        //$data['student_class_id'] = StudentClass::orderBy('id', 'asc')->first()->id;
        $data['allData'] = AssignStudent::all();


        return view('backend.members.viewStd', $data);
    }

    public function ClassYearWise(Request $request)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['student_class_id'] = $request->student_class_id;
        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('student_class_id', $request->student_class_id)->get();
        return view('backend.members.viewStd', $data);
    }

    public function stdAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.members.addStd', $data);
    }

    public function stdStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            //$student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first();
            $student = Student::where('usertype', 'student')->orderBy('id', 'DESC')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;

                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                //$student = User::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
                $student = Student::where('usertype', 'student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;

                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            }

            $final_id_no = $checkYear . $id_no;
            //$user = new User();
            $user = new Student();
            $code = rand(0000, 9999);
            $user->mn_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'student';
            $user->code = $code;
            $user->name = $request->name;
            $user->id_no = $request->id_no;
            $user->noKin = $request->noKin;
            $user->occupation = $request->occupation;
            $user->kra = $request->kra;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));


            if ($request->file('image')) {
                $file = $request->file('image');
                //@unlink(public_path('upload/user_image/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }

            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->student_class_id = $request->student_class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;

            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;

            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Registered successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('std.view')->with($notification);
    }

    public function stdEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.members.editStd', $data);
        // return view('backend.student.student_reg.edit_student_reg', $data);
    }

    public function stdUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {



            //$user = User::where('id', $student_id)->first();

            $user = Student::where('id', $student_id)->first();

            $user->name = $request->name;
            $user->id_no = $request->id_no;
            $user->noKin = $request->noKin;
            $user->occupation = $request->occupation;
            $user->kra = $request->kra;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user_image/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }

            $user->save();

            $assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->student_class_id = $request->student_class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;

            $assign_student->save();

            $discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discount_student->discount = $request->discount;

            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student Details Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('std.view')->with($notification);
    }
}
