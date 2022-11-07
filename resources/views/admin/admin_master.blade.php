<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href={{asset('https://html.psdtohtmlexpert.com/admin/sunny-admin-template/images/favicon.ico')}}>

    <title>School Management - Dashboard</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Vendors Style-->
	<link rel="stylesheet" href={{asset('backend/css/vendors_css.css')}}>
	  
	<!-- Style-->  
	<link rel="stylesheet" href={{asset('backend/css/style.css')}}>
	<link rel="stylesheet" href={{asset('backend/css/skin_color.css')}}>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <!--Header -->

    @include('admin.body.header')

  <!--Header End -->
  
  <!-- Left side column. contains the logo and sidebar -->
  
    <!-- sidebar-->
    @include('admin.body.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
    @yield('admin')
  <!-- End Content Wrapper -->
    @include('admin.body.footer')

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
    
	<script src={{asset('backend/js/vendors.min.js')}}></script>
    <script src={{asset('../assets/icons/feather-icons/feather.min.js')}}></script>	
	<script src={{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}></script>
	<script src={{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}></script>
	<script src={{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}></script>
	
	<!-- Sunny Admin App -->
    
    <script src={{asset('../assets/icons/feather-icons/feather.min.js')}}></script>	
    <script src={{asset('../assets/vendor_components/datatable/datatables.min.js')}}></script>
	<script src={{asset('backend/js/pages/data-table.js')}}></script>

	<script src={{asset('backend/js/template.js')}}></script>
	<script src={{asset('backend/js/pages/dashboard.js')}}></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    $(function(){
      $(document).on('click', '#delete', function(e){
          e.preventDefault();
          var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete them!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'User Deleted Successfully.',
                'success'
              )
            }
          })
      });
    });

  </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	
  <script>
    @if(Session::has('message'))
    var type = "{{ Session:: get('alert-type', 'info')}}"
    switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;

      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;

      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;

      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break;
    }
    @endif
  </script>
	
</body>

<!-- Mirrored from html.psdtohtmlexpert.com/admin/sunny-admin-template/main-dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 13:15:20 GMT -->
</html>
