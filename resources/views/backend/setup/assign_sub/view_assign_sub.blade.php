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

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Subject List</h3>
                <a href="{{ route('assign.subject.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Subject Assignment</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1"  class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              
                              <th>Class Name</th>
                              
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allData as $key=> $assign)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                
                                <td>{{ $assign['student_class']['name'] }}</td> <!-- Displaying the name from related tables -->
                                
                                <td>
                                    <a href="{{ route('assign.subject.edit',$assign->student_class_id) }}" class="btn btn-info" >Edit</a>
                                    <a href="{{ route('assign.subject.details',$assign->student_class_id) }}" class="btn btn-primary" >Details</a>
                                </td>
                                
                            </tr>   
                          @endforeach
                          
                          
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>
                            
                            <th>Name</th>
                            
                            <th>Action</th>
                          </tr>
                      </tfoot>
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