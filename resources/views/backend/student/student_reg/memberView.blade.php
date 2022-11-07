<!-- Content Wrapper. Contains page content -->

@extends('admin.admin_master')
@section('admin')

    

@php
    $students = App\Models\User::where('usertype','student')->count();
    $employees = App\Models\User::where('usertype','employee')->count();
    
@endphp
    

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
            
              <div class="col-xl-4 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                        <h3 class="text-center"><b>Member Details</b></h3>							
                          <h5><b>Name: {{$member->name}} </b></h5>
                          <h5><b>ID:</b></h5>
                          <h5><b>Occupation:</b></h5>
                          <h5><b>Member No:</b></h5>
                          <div>
                            <a href="" class="btn btn-info" ><i class="fa fa-edit"></i></a>
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
                          
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              
                          </div>
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