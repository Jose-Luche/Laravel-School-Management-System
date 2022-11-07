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
                <h3 class="box-title">Chart of Accounts</h3>
                <a href="{{ route('ledger.add')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Account</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              
                              <th>Type</th>
                              <th>Name</th>
                              <th>Account Number</th>
                              
                              
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allData as $key=> $acc)
                            <tr>
                                
                                <td> {{ $acc->accType }} </td>
                                <td>{{ $acc->accName }}</td>
                                <td>{{ $acc->accNo }}</td>
                                  
                            </tr>   
                          @endforeach
                          
                          
                      </tbody>
                      <tfoot>
                          <tr>
                            
                            <th>Type</th>
                            <th>Name</th>
                            <th>Account Number</th>
                            
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