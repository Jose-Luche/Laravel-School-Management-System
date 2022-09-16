@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

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
              <h4 class="box-title">Add <strong>Student Fee</strong></h4>
              </div>
    
              <div class="box-body"> <!-- Search option Form -->
                  
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
                                <h5>Fee Category<span class="text-danger"></span></h5>
                                <div class="controls">
                                    <select name="fee_category_id" id="fee_category_id" required="" class="form-control">
                                        <option value="" selected="" disabled="">Select Fee Category</option>
                                        @foreach ($fee_categories as $fee) <!-- Displaying search parameters on screen -->
                                            <option value="{{ $fee->id }}" >{{ $fee->name }}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <h5>Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" id="date" class="form-control" required=""  > 
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>  
                        
                        <div class="col-md-3" style="padding-top: 25px;">
                          <a  id="search" class="btn btn-primary" name="search">Search</a>
                        </div> 
                        
                                       
                                        
                           
                    </div>
                    <!-- Marks Entry table -->
                                        
                    <div class="row">
                      <div class="col-md-12">
                        <div id="DocumentResults"> <!-- ID to be used to load handlejs -->
                            <script id="document-template" type="text/x-handlebars-template">
                                <form action="{{ route('student.fee.store')}}" method="POST">
                                @csrf
                                <table class="table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>

                                        @{{/each}}
                                    </tbody>

                                </table>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                                </form>
                            </script>
                        </div>
                          
                      </div>
                        
                    </div> 

                    
                 
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
<!-- Get Registration Fee Method -->
<script type="text/javascript">
    $(document).on('click', '#search', function(){
        var year_id = $('#year_id').val();
        var student_class_id = $('#student_class_id').val();
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();
        
        $.ajax({
            url: "{{ route('student.fee.getstudent')}}",
            type: "get",
            data: {'year_id':year_id,'student_class_id':student_class_id,'fee_category_id':fee_category_id,'date':date},
            beforeSend:function() {

            },
            success:function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle = "tooltip"]').tooltip();
            }
        });
    });

</script>



@endsection