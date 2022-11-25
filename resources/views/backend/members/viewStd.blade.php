@extends('admin.admin_master')
@section('admin')
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
              <h4 class="box-title">Student <strong>Search</strong></h4>
              </div>
    
              <div class="box-body"> <!-- Search option Form -->
                  <form method="GET" action="{{ route('student.year.class.wise')}}">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <h5>Year<span class="text-danger"></span></h5>
                              <div class="controls">
                                  <select name="year_id"  required="" class="form-control">
                                      <option value="" selected="" disabled="">Select Year</option>
                                      
                                      @foreach ($years as $year)
                                          <option value="{{ $year->id }}">{{ $year->name }}</option> 
                                      @endforeach
                                      
                                      
                                      
                                      
                                  </select>
                              </div>
                          </div>

                        </div>    
                      

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Class<span class="text-danger"></span></h5>
                                <div class="controls">
                                    <select name="student_class_id"  required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Class</option>
                                        @foreach ($classes as $class) <!-- Displaying search parameters on screen -->
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>   
                        
                        <div class="col-md-4" style="padding-top: 25px;">
                          <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                        </div>    
                                        
                                        
                                        
                           
                    </div>
                  </form>
              </div>
            </div>
          </div>

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('std.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                
                                <th>ID No</th>
                                <th>Name</th>
                                <th>Occupation</th>
                                <th>KRA</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=> $value)
                              <tr>
                                  <td>{{ $key+1 }}</td>

                                  <td><a href="{{url('student/std/'.$value->id)}}">{{ $value['student']['id_no']}}</a></td>
                                  <td>{{ $value['student']['name'] }}</td>
                                  <td>{{ $value['student']['occupation'] }}</td>
                                  <td>{{ $value['student']['kra'] }}</td>
                                  <td>{{ $value['student']['email'] }}</td>
                                  <td>{{ $value['student']['mobile'] }}</td>
                                  
                                  
                                  <td>
                                      <a href="{{ route('std.edit',$value->student_id) }}" class="btn btn-info" ><i class="fa fa-edit"></i></a>
    
                                      <a target="_blank" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger" ><i class="fa fa-eye"></i></a>
                                  </td>
                                  
                              </tr>   
                            @endforeach
                            
                            
                        </tbody>
                        
                      </table> 
                      
                        
                    
                    
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
