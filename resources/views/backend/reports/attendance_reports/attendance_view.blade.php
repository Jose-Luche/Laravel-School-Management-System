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
              <h4 class="box-title">Manage <strong>Employee Attendance Report</strong></h4>
              </div>
    
              <div class="box-body"> <!-- Search option Form -->
                  <form method="GET" action="{{ route('reports.attendance.get')}}" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <h5>Employee Name<span class="text-danger"></span></h5>
                              <div class="controls">
                                  <select name="employee_id" id="employee_id" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select Employee</option>
                                      
                                      @foreach ($employees as $employee)
                                          <option value="{{ $employee->id }}" >{{ $employee->name }}</option> 
                                      @endforeach
                                      
                                      
                                      
                                      
                                  </select>
                              </div>
                          </div>

                        </div>    
                        


                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date"  class="form-control" required=""  > 
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-4" style="padding-top: 25px;">
                            <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                        </div> 
                        
                                       
                                        
                           
                    </div>
                    <!-- Marks Entry table -->
                                        
                    

                    
                  </form>
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