
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="nav" onload="mode()"  style="transition: all 1s" >
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ Route('dashboard') }}" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" title="Change mode" id="mode"  onclick="changemode()" >
            {{-- <input type="checkbox" id="mode" name="mode" value="light" onchange="changemode()" data-bootstrap-switch data-off-color="dark" data-off-text="<i class='fas fa-moon'></i>" data-on-color="light" data-on-text="<i class='fas fa-sun'></i>"> --}}
            <i class="fas fa-sun" style="font-size: 17px"></i>
          </a>

        </li>
        <li class="nav-item">
          <a class="nav-link" id="full" title="Full screen" data-widget="fullscreen" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" title="Logout"  data-toggle="modal" data-target="#logout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
        </li>
      </ul>
    </nav>
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          Are you sure you want logout?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a href="/signout" type="button" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-primary elevation-4 bg-light" id="men" onload="mode()">
      <!-- Brand Logo -->

      <!-- Sidebar -->
      <div class="sidebar mt-1">
        <!-- Sidebar user (optional) -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" id="search" style="transition: all 1s" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar" style="transition: 1s all">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item">
                  <a href="{{ Route('dashboard') }}" class="nav-link @if(Route::currentRouteName()=='dashboard')active @endif">
                    <i class="fas fa-chart-line"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                @if(Auth::user())
                @if(Auth::user()->level=='Superadmin')
                <li class="nav-item">
                  <a href="{{ Route('admins') }}" class="nav-link  @if(Route::currentRouteName()=='admins') active @endif"">
                    <i class="fas fa-user"></i>
                    <p>
                      Admins
                    </p>
                  </a>
                </li>
                @endif
                @endif
                <li class="nav-item">
                    <a href="{{ Route('cmshomepage') }}" class="nav-link @if(Route::currentRouteName()=='cmshomepage')active @endif">
                      <i class="fas fa-home"></i>
                      <p>
                        Home
                      </p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ Route('cmsaboutpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsaboutpage')active @endif">
                    <i class="fas fa-info-circle"></i>
                    <p>
                      About Us
                    </p>
                  </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName()=='cmsservicepage' || Route::currentRouteName()=='cmsdoctorpage') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Route::currentRouteName()=='cmsservicepage' || Route::currentRouteName()=='cmsdoctorpage') active @endif">
                        <i class="fas fa-user-injured"></i>
                      <p>
                        For Patients
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('cmsservicepage') }}" class="nav-link @if(Route::currentRouteName()=='cmsservicepage')active @endif">
                                <i class="fas fa-briefcase-medical"></i>
                              <p>
                                Services
                              </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('cmsdoctorpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsdoctorpage')active @endif">
                                <i class="fas fa-user-md" style="font-size: 17px"></i>
                              <p>
                                Doctors
                              </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName()=='cmsconsultantpage' || Route::currentRouteName()=='cmsequipementpage') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Route::currentRouteName()=='cmsconsultantpage' || Route::currentRouteName()=='cmsequipementpage') active @endif">
                        <i class="fas fa-stethoscope"></i>
                      <p>
                        For Doctors
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('cmsconsultantpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsconsultantpage')active @endif">
                                <i class="fas fa-comment-medical"></i>
                              <p>
                                Consultant
                              </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('cmsequipementpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsequipementpage')active @endif">
                                <i class="fas fa-image"></i>
                              <p>
                                Hospital Equipment
                              </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('cmsdepartmentpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsdepartmentpage')active @endif">
                        <i class="fas fa-hospital-user"></i>
                      <p>
                        Our Departments
                      </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('cmsappointmentpage') }}" class="nav-link @if(Route::currentRouteName()=='cmsappointmentpage')active @endif">
                        <i class="fas fa-calendar-check"></i>
                      <p>
                        Appointments
                      </p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ Route('cmscontactpage') }}" class="nav-link @if(Route::currentRouteName()=='cmscontactpage')active @endif">
                    <i class="fas fa-comment"></i>
                    <p>
                      Contact Us
                    </p>
                  </a>
                </li>
          </ul>
        </nav>
      </div>
    </aside>
