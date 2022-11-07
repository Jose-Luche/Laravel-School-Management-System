@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp



<aside class="main-sidebar">
  <section class="sidebar">	
      
      <div class="user-profile">
          <div class="ulogo">
              <a href="index-2.html">
                <!-- logo for regular state and mobile devices -->
                  <div class="d-flex align-items-center justify-content-center">					 	
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>School</b> Admin</h3>
                  </div>
              </a>
          </div>
      </div>
    
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">  
        
      <li class= "{{ ($route == 'dashboard')?'active':'' }}">
        <a href="{{ route('dashboard') }}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>  
      
      @if (Auth::user()->role =='Admin')
        <li class="treeview {{ ($prefix == '/users')?'active':'' }} " >
          <a href="#">
            <i data-feather="user"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view')}}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('users.add')}}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li>  
      @endif
      
        
      <li class="treeview {{ ($prefix == '/profile')?'active':'' }} ">
        <a href="#">
          <i data-feather="user-check"></i> <span>Manage Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
          <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/setup')?'active':'' }} ">
        <a href="#">
          <i data-feather="settings"></i> <span>Setup</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Member Group</a></li>
          <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Member Year</a></li>
          <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
          <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Member Shift</a></li>
          <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Contribution Category</a></li>
          <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Contribution Amount</a></li>
          <!--<li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
          <li><a href="{{ route('subject.view') }}"><i class="ti-more"></i>Subject</a></li>
          <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
          <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>-->
         

          
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/student')?'active':'' }} ">
        <a href="#">
          <i data-feather="users"></i> <span>Member Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Member Registration</a></li>
          <!--<li><a href="{{ route('role.generate.view') }}"><i class="ti-more"></i>Role Generate</a></li>-->
          <li><a href="{{ route('reg.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>
          <li><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Weekly Fee</a></li>
          <li><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Admin Fee</a></li>
          
          
        </ul>
      </li>

      <!--<li class="treeview {{ ($prefix == '/employees')?'active':'' }} ">
        <a href="#">
          <i data-feather="users"></i> <span>Employee Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('employee.reg.view') }}"><i class="ti-more"></i>Employee Registration</a></li>
          <li><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
          <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>
          <li><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>
          <li><a href="{{ route('monthly.salary.view') }}"><i class="ti-more"></i>Employee Monthly Salary</a></li>
          
          
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/marks')?'active':'' }} ">
        <a href="#">
          <i data-feather="briefcase"></i> <span>Marks Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == '/marks.entry.add')?'active':'' }}"><a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a></li>
          <li class="{{ ($route == '/marks.entry.edit')?'active':'' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a></li>
          <li ><a href="{{ route('grade.view') }}"><i class="ti-more"></i>Marks Grade</a></li>
          
          
          
          
        </ul>
      </li>-->

      <li class="treeview {{ ($prefix == '/accounts')?'active':'' }} ">
        <a href="#">
          <i data-feather="credit-card"></i> <span>Accounts Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == '/student.fee.view')?'active':'' }}"><a href="{{ route('student.fee.view') }}"><i class="ti-more"></i>Projections</a></li>
          <!--<li class="{{ ($route == '/account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>
          <li class="{{ ($route == '/other.costs.view')?'active':'' }}"><a href="{{ route('other.costs.view') }}"><i class="ti-more"></i>Other Costs</a></li>-->
          <li class="{{ ($route == '/ledger.view')?'active':'' }}"><a href="{{ route('ledger.view') }}"><i class="ti-more"></i>Accounts</a></li>
          <li class="{{ ($route == '/receipt.view')?'active':'' }}"><a href="{{ route('receipt.view') }}"><i class="ti-more"></i>Receipts</a></li>
          
           
        </ul>
      </li>

      
      
      
      <!--<li class="header nav-small-cap">Reports</li>
        
      <li class="treeview {{ ($prefix == '/reports')?'active':'' }} ">
        <a href="#">
          <i data-feather="server"></i> <span>Reports Management</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == '/monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly/Yearly Profit</a></li>
          <li class="{{ ($route == '/marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>Marksheet Generator</a></li>
          <li class="{{ ($route == '/attendance.report.view')?'active':'' }}"><a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a></li>
          <li class="{{ ($route == '/student.result.view')?'active':'' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Results</a></li>
          <li class="{{ ($route == '/student.idcard.view')?'active':'' }}"><a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student ID Card</a></li>
          
          
           
        </ul>
      </li>-->
      
    </ul>
  </section>
</aside>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>