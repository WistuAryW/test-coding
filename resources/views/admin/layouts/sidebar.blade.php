<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Web Developer</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('students.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('extracurriculars.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Ekstrakulikuler</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('studentsextra.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Ekstrakulikuler Siswa</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
