@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row"> 
          
          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Marksheet <strong>PDF View</strong></h4>
              </div>
    
              <div class="box-body" style="border:solid 1px; padding:10px"> <!-- Search option Form -->
                <div class="row">
                    <div style="float: right;" class="col-md-2 text-center">
                        <img src="{{ url('upload/logo.png')}}" style="width: 120px; height: 100px;" alt="">
                    </div>

                    <div class="col-md-2 text-center">

                    </div>

                    <div class="col-md-4 text-center" style="float: left;">
                        <h4><strong>Sonic School</strong></h4>
                        <h6><strong>Nairobi, Kenya</strong></h6>
                        <h5><strong><u><i>Academic Transcripts</i></u></strong></h5>
                        <h6><strong>{{ $allMarks['0']['exam_type']['name']}}</strong></h6>
                    </div>

                    <div class="col-md-12">
                        <hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;">
                        <p style="text-align: right;"><u><i>Print Date: </i>{{ date('d M Y') }}</u></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                    
                        <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8"
                        cellspacing="2">
                        @php
                            $assign_student = App\Models\AssignStudent::where('year_id',$allMarks['0']->year_id)->
                            where('student_class_id',$allMarks['0']->class_id)->first();
                        @endphp

                        <tr>
                            <td width="50%">Student ID </td>
                            <td width="50%">{{ $allMarks['0']['id_no']}}</td>
                        </tr>

                        <tr>
                            <td width="50%">Role No </td>
                            <td width="50%">{{ $assign_student->role }}</td>
                        </tr>

                        <tr>
                            <td width="50%">Name </td>
                            <td width="50%">{{ $allMarks['0']['student']['name']}}</td>
                        </tr>

                        <tr>
                            <td width="50%">Class </td>
                            <td width="50%">{{ $allMarks['0']['student_class']['name']}}</td>
                        </tr>

                        <tr>
                            <td width="50%">Session </td>
                            <td width="50%">{{ $allMarks['0']['year']['name']}}</td>
                        </tr>

                        </table>
                    </div>

                    <div class="col-md-6">
                        <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8"
                        cellspacing="2">
                            <thead>
                                <tr>
                                    <th>Grade</th>
                                    <th>Marks Interval</th>
                                    <th>Grade Point</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $allGrades as $value)
                                    <tr>
                                        <td>{{ $value->grade_name}}</td>
                                        <td>{{ $value->start_marks}} - {{ $value->end_marks}} </td>
                                        <td>{{ number_format((float)$value->grade_point,2) }}
                                         - {{ ($value->grade_point == 5)?(number_format((float)$value->grade_point,2)):
                                          (number_format((float)$value->grade_point+1,2) -(float)0.01)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8"
                        cellspacing="2">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Get Marks</th>
                                    <th class="text-center">Letter Grade</th>
                                    <th class="text-center">Grade Point</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_marks = 0;
                                    $total_points = 0;
                                @endphp
                                
                                @foreach ($allMarks as $key => $value)
                                  @php
                                      $get_mark = $value->marks;
                                      $total_marks = (float)$total_marks + (float)$get_mark;
                                      $total_subjects = App\Models\StudentMarks::where('year_id',$value->year_id)->
                                      where('class_id',$value->class_id)->where('exam_type_id',$value->exam_type_id)->
                                      where('student_id',$value->student_id)->get()->count();
                                  @endphp  

                                  <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $get_mark }}</td>
                                  

                                    @php
                                        $grade_marks = App\Models\Grade::where([['start_marks','<=',(int)$get_mark],
                                        ['end_marks','>=',(int)$get_mark ]])->first();
                                        $grade_name = $grade_marks->grade_name;
                                        $grade_point = number_format((float)$grade_marks->grade_point,2);
                                        $total_points = (float)$total_points + (float)$grade_point;
                                        
                                    @endphp
                                    <td class="text-center">{{ $grade_name }}</td>
                                    <td class="text-center">{{ $grade_point }}</td>
                                  </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td>
                                    <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
                                </tr>
                        </table>
                    </div>

                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8"
                        cellspacing="2">
                           @php
                               $total_grade = 0;
                               $pflg = (float)$total_points/(float)$total_subjects;
                               $total_grade = App\Models\Grade::where([['start_marks','<=',(int)$get_mark],
                                        ['end_marks','>=',(int)$get_mark ]])->first();
                                $point_average = (float)$total_points/(float)$total_subjects;
                           @endphp 

                           <tr>
                                <td width="50%"><strong>Grade Point Average</strong></td>
                                <td width="50%">
                                    @if ($count_fail > 0)
                                    0.00

                                    @else
                                        {{number_format((float)$point_average,2)}}
                                        
                                    @endif
                                </td>
                           </tr>
                           <tr>
                            <td width="50%"><strong>Letter Grade</strong></td>
                            <td width="50%">
                                @if ($count_fail >0)
                                 E   
                                @else
                                   {{ $total_grade->grade_name}} 
                                @endif
                            </td>
                           </tr>

                           <tr>
                            <td width="50%"> Total Marks with Fraction</td>
                            <td width="50%"><strong>{{ $total_marks }}</strong></td>
                           </tr>
                        </table>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table border="1" style="border-color: #ffffff;" width="100%" cellpadding="8"
                        cellspacing="2">
                            <tbody>
                                <tr>
                                    <td style="text-align: left"><strong>Remarks:</strong>
                                        @if ($count_fail > 0)
                                            Remedials needed!
                                        @else
                                            {{ $total_grade->remarks }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br><br><br>

                <div class="row">
                    <div class="col-md-4">
                        <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                        <div class="text-center">Teacher</div>
                    </div>

                    <div class="col-md-4">
                        <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                        <div class="text-center">Guardian</div>
                    </div>

                    <div class="col-md-4">
                        <hr style="border: solid 1px; widows: 60%; color: #ffffff; margin-bottom: -3px;">
                        <div class="text-center">Principal</div>
                    </div>
                </div>
                
                <br><br>
              </div>
            </div>
          </div>

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->


<!-- Load Class By Subject -->

@endsection