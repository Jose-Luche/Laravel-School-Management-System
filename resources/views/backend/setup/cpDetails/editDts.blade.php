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
                 <h4 class="box-title">Company Details</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('details.update', $editData->id)}}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name"  class="form-control" required="" value="{{$editData->name}}"  > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Branch Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="brCode"  class="form-control" value="{{$editData->brCode}}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Country <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="country"  class="form-control" value="{{$editData->country}}"  > 
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
                                                <h5>Country Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="cCode"  class="form-control" required="" value="{{$editData->cCode}}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>P.O.BOX <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="zipCode"  class="form-control" required="" value="{{$editData->zipCode}}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>City<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="city"  class="form-control" required="" value="{{$editData->city}}"> 
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
                                                <h5>Telephone <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="tel"  class="form-control" required="" value="{{$editData->tel}}" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mobile <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="mobile"  class="form-control" required="" value="{{$editData->mobile}}"> 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Physical Location <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phLocation"  class="form-control" required="" value="{{$editData->phLocation}}"> 
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
                                                <h5>Logo<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                        
                                                <div class="controls">
                                                    
                                                    <img  class="rounded-circle" src="{{ (!empty($editData->image))? 
                                                    url('upload/company_images/'.$editData->image):url('upload/no_image.jpg') }}" style="width: 80px; height: 80px; border: 1px solid;">
                                                </div>
                                                
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <h5>Payment Options <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="payOptions" id="textarea" class="form-control" required="" placeholder="Narration..." value="{{$editData->payOptions}}"></textarea>
                                                <div class="help-block"></div></div>
                                            </div>
                                        </div>
                                    </div>

                                    
                            
                                    
                                

                                    
                                    

                                
                                  
                               
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                               
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