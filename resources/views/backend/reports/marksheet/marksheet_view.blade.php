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
              <h4 class="box-title">Marksheet <strong>Generator</strong></h4>
              </div>
    
              <div class="box-body"> <!-- Search option Form -->
                  <form method="GET" action="{{ route('reports.marksheet.get')}}" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <h5>Year<span class="text-danger"></span></h5>
                              <div class="controls">
                                  <select name="year_id" id="year_id" required="" class="form-control">
                                      <option value="" selected="" disabled="">Select Year</option>
                                      
                                      @foreach ($years as $year)
                                          <option value="{{ $year->id }}" >{{ $year->name }}</option> 
                                      @endforeach
                                      
                                      
                                      
                                      
                                  </select>
                              </div>
                          </div>

                        </div>    
                      

                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Class<span class="text-danger"></span></h5>
                                <div class="controls">
                                    <select name="student_class_id" id="student_class_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Class</option>
                                        @foreach ($classes as $class) <!-- Displaying search parameters on screen -->
                                            <option value="{{ $class->id }}" >{{ $class->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>   

                        

                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Exam Type<span class="text-danger"></span></h5>
                                <div class="controls">
                                    <select name="exam_type_id" id="exam_type_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Class</option>
                                        @foreach ($exam_type as $type) <!-- Displaying search parameters on screen -->
                                            <option value="{{ $type->id }}" >{{ $type->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>ID No <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="id_no"  class="form-control" required=""  > 
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-3" style="padding-top: 25px;">
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