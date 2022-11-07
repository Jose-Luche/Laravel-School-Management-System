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
                 <h4 class="box-title">Add Student</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('ledger.store')}}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Account Type <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="accType" id="accType" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Type</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Current Assets">Current Assets</option>
                                                        <option value="Current Liabilities">Current Liabilities</option>
                                                        <option value="Equity">Equity</option>
                                                        <option value="Income">Income</option>
                                                        <option value="Investments">Investments</option>
                                                        <option value="Non-current Liabilities">Non-current Liabilities</option>
                                                        <option value="Petty Cash">Petty Cash</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>  
                                        </div>   
                                        

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Account Subtype <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="accSubType"  class="form-control" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Account Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="accName"  class="form-control"   > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Account Number <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="accNo"  class="form-control" required=""  > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>    
                                        

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Opening Balance <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="openBalance"  class="form-control" required="" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <h5>Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="regDate"  class="form-control" required="" > 
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Narration <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="textarea" id="textarea" class="form-control" required="" placeholder="Narration..."></textarea>
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