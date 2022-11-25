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
                <h3 class="box-title">Prospect List</h3>
                <a href="{{ route('prospect.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Prospect</a>
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
                                <th>Next of Kin</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Occupation</th> 
                               
                                
                                
                                
                                
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $key=> $value)
                              <tr>
                                  <td>{{ $key+1 }}</td>
                                  
                                  <td><a href="{{url('prospect/prospect/profile/view/'.$value->id)}}">{{ $value->id_no}}</a></td>
                                  <td>{{ $value->name }}</td>
                                  <td>{{ $value->noKin }}</td>
                                  <td>{{ $value->mobile }}</td>
                                  <td>{{ $value->address }}</td>
                                  <td>
                                    <img  class="rounded-circle" src="{{ (!empty($value->image))? 
                                    url('upload/prospect_images/'.$value->image):url('upload/no_image.jpg') }}" style="width: 50px; height: 50px; border: 1px solid;">
                                  </td>
                                  <td>{{ $value->occupation }}</td>
                                  
                                  
                                  <td>
                                      <a href="{{route('prospect.edit',$value->id)}}" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                                      <a href="{{route('prospect.delete',$value->id)}}" class="btn btn-info" ><i class="fa fa-trash"></i></a>
                                      
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
