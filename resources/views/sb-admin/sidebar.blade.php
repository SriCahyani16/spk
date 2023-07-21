<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK MAYDAS <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard-spk">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>



    @if (Auth::user()->type=="admin")

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Admin Management
      </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item active">
        <a class="nav-link" href="/index-criteria">
            <i class="fas fa-fw fa-table"></i>
            <span>Kriteria</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="/index-user">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>


    @elseif (Auth::user()->type=="user")
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Panitia Management
     </div>
    <li class="nav-item active">
        <a class="nav-link" href="/index-alternative">
            <i class="fas fsa-fw fa-table"></i>
            <span>Alternatif</span></a>
    </li>

    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Penilaian
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="/penilaian">
            <i class="fas fa-fw fa-book"></i>
            <span>Perhitungan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/hasil">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hasil Akhir</span></a>
    </li>



    <!-- Divider -->


    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
