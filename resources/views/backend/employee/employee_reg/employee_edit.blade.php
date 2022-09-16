@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        
        <div class="container-full">
        <!-- Content Header (Page header) -->
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit Employee</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('employee.reg.update',$editData->id)}}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Employee Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name"  class="form-control" required="" value="{{ $editData->name }}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Father's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="fname"  class="form-control" value="{{ $editData->fname }}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mname"  class="form-control" value="{{ $editData->mname }}"  > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mobile"  class="form-control" required="" value="{{ $editData->mobile }}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="address"  class="form-control" required="" value="{{ $editData->address }}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Gender <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="gender" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Gender</option>
                                                        <option value="Male" {{ ($editData->gender == 'Male')? 'selected': '' }}>Male</option>
                                                        <option value="Female" {{ ($editData->gender == 'Female')? 'selected': '' }}>Female</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Religion <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="religion" id="religion" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Religion</option>
                                                        <option value="Christian" {{ ($editData->religion == 'Christian')? 'selected': '' }}>Christian</option>
                                                        <option value="Muslim" {{ ($editData->religion == 'Muslim')? 'selected': '' }}>Muslim</option>
                                                        <option value="Hindu" {{ ($editData->religion == 'Hindu')? 'selected': '' }}>Hindu</option>
                                                        <option value="Budhist" {{ ($editData->religion == 'Budhist')? 'selected': '' }}>Budhist</option>
                                                        <option value="TAS" {{ ($editData->religion == 'TAS')? 'selected': '' }}>TAS</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>D.O.B <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="dob"  class="form-control" required="" value="{{ $editData->dob }}"> 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Designation<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="designation_id"  required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Designation</option>
                                                        
                                                        @foreach ($designation as $designation)
                                                            <option value="{{ $designation->id }}" {{ ($editData->designation_id == $designation->id)?'selected':'' }}>{{ $designation->name }}</option> 
                                                        @endforeach
                                                        
                                                        
                           
                                                        
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if (!@editData)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Salary <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary"  class="form-control" required="" value="{{ $editData->salary }}"> 
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>    
                                        @endif
                                        
                                        @if (!@editData)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <h5>Joining Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="join_date"  class="form-control" required="" value="{{ $editData->join_date }}"> 
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
   
                                        

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Profile Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                        
                                                <div class="controls">
                                                    
                                                    <img  class="rounded-circle" src="{{ (!empty($editData->image))? 
                                                    url('upload/employee_images/'.$editData->image):url('upload/no_image.jpg') }}" style="width: 80px; height: 80px; border: 1px solid;">
                                                </div>
                                                
                                            </div> 
                                        </div>
                                    </div>

                                    
                            
                                    
                                

                                    
                                    

                                
                                  
                               
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                               
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>

        
        
        </div>
    </div>

    <!-- Changing on screen images for viewing before update -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection