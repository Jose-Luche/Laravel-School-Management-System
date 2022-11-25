<!-- Content Wrapper. Contains page content -->

@extends('admin.admin_master')
@section('admin')

    


    

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
            
              <div class="col-xl-4 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                        <h3 class="text-center"><b>Member Details</b></h3>							
                          <h5><b>Name: {{$student->name}} </b></h5>
                          <h5><b>ID: {{$student->id_no}}</b></h5>
                          <h5><b>Mobile: {{$student->mobile}}</b></h5>
                          <h5><b>Address: {{$student->address}}</b></h5>
                          <div>
                            <a href="{{route('std.edit', $student->id)}}" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">							
                        <h3 class="text-center"><b>Contributions </b></h3>							
                        <h5><b>Total Admin:</b></h5>
                        <h5><b>Total Reg:</b></h5>
                        <h5><b>Total Monthly:</b></h5>
                        <h5><b>Total:</b></h5>
                      </div>
                  </div>
              </div>

              <div class="col-xl-4 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                      <h3 class="text-center"><b>Shares </b></h3>							
                      
                    </div>
                </div>
            </div>
              
              
              
              
              
              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                        <a href="{{ route('prospect.add')}}" style="float: right; margin-right:4px;"  class="btn btn-rounded btn-success mb-5">STATEMENT</a>
                        <a href="{{ route('prospect.add')}}" style="float: right; margin-right:4px;" class="btn btn-rounded btn-success mb-5">RECEIPT</a>
                        <a href="{{ route('prospect.add')}}" style="float: right; margin-right:4px;" class="btn btn-rounded btn-success mb-5">DOCUMENTS</a>
                        <a href="{{ route('prospect.add')}}" style="float: right; margin-right:4px;" class="btn btn-rounded btn-success mb-5">Add Prospect</a> 
                      </div>
                      <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <h5>Bills</h5>
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Date</th>
                                    <th>Fee Type</th>
                                    <th>Amount</th> 
                                      
                                </tr>
                            </thead>
                            <tbody>
                                @if ($student->bills != null)
                                    @foreach ($student->bills as $key => $value)

                                    <tr>
                                        <td><a href="{{url('accounts/make_payment/'.$value->id)}}">{{ $key+1 }}</a></td>
                                        <td>{{ date('M Y', strtotime($value->date)) }}</td> 
                                        <td>{{ $value['fee_category']['name'] }}</td>
                                        <td>{{ $value->amount }}</td>
                                        
                                        
                                    </tr> 
                                        
                                    @endforeach
                                
                                    
                                @endif

                                    
                                
                                
                                
                            </tbody>
                            
                          </table>
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <h5>Receipts</h5>
                            <thead>
                                <tr>
                                    <th>Payment Mode</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                    <th>Amount</th>  
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if ($student->receipts != null)
                                    @foreach($student->receipts as $value)
                                        <!-- Add Receipt table -->
                                        <tr>
                                            
                                            <td>{{ $value->payMode }}</td>
                                            <td>{{ $value->reference }}</td>
                                            <td>{{ $value->regDate }}</td>
                                            <td>{{ $value->amount }}</td>    
                                        </tr>   
                                    @endforeach
                                @endif
                                
                                
                                
                            </tbody>
                            
                          </table>
                      </div>
                  </div>  
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection
<!-- /.content-wrapper -->