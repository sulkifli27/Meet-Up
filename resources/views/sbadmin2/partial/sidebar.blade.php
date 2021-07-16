<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Meet Up</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        data user
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        data room Meetup
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('meetups.index')}}">
            <i class="fas fa-fw fa-building"></i>
            <span>Room Meetup</span></a>
    </li>
    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Data Detail Meeting
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('detail-meeting.index')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Detail Meeting</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Data All Meeting
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('all-meeting')}}">
            <i class="fas fa-fw fa-book"></i>
            <span>Detail All Meeting</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>