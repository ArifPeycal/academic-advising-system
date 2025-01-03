<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>i-Plan</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo-small.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    
    <!-- Include only Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="#" class="logo">
                <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
            </a>
            <a href="#" class="logo logo-small">
                <img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
            </a>
        </div>

        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item zoom-screen me-2">
                <a href="#" class="nav-link header-nav-list win-maximize">
                    <img src="{{asset('assets/img/icons/header-icon-04.svg')}}" alt="">
                </a>
            </li>

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" width="31" alt="{{ session('name') ?? 'User' }}">
                        <div class="user-text">
                            <h6>{{ Auth::user()->name ?? 'Guest' }}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->getRoleNames()->first() ?? 'Role Not Assigned' }}</p>
                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="user-text">
                            <h6>{{ Auth::user()->name ?? 'Guest' }}</h6>
                            <p class="text-muted mb-0">{{ Auth::user()->getRoleNames()->first() ?? 'Role Not Assigned' }}</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile">My Profile</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                        <!-- @role('admin')
                        <li>
                            <a href="kict-dashboard"><i class="feather-grid"></i> <span> Admin Dashboard</span> </a>
                        </li>
                        @endrole
                        @role('advisor')
                        <li>
                            <a href="teacher-dashboard"><i class="feather-grid"></i> <span> Advisor Dashboard</span> </a>
                        </li>
                        @endrole
                        @role('student')
                        <li>
                            <a href="{{ route('student-dashboard') }}"><i class="feather-grid"></i> <span> Student Dashboard</span> </a>
                        </li>
                        @endrole -->
                        @if(auth()->user()->hasRole('advisor') || auth()->user()->hasRole('student'))
                    <li class="submenu">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Advising </span> <span class="menu-arrow"></span></a>
                        <ul>
                            @role('advisor')
                            <li><a href="advisor/student-list">Student List</a></li>
                            <li><a href="{{ route('appointments.index') }}">Appointment List</a></li>
                            @endrole
                            @role('student')
                            <li><a href="{{ route('appointments.create') }}">Book Appointment</a></li>
                            <li><a href="{{ route('appointments.myAppointments') }}">Appointment History</a></li>
                            @endrole
                        </ul>
                    </li>
                    @endif
                    <li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Course</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('course.index') }}">Course List</a></li>
                            @role('admin')
                            <li><a href="{{ route('course.create') }}">Course Add</a></li>
                            @endrole
                        </ul>
                    </li>
                    @role('student')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Course Schedule</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('student_course_schedule.index', ['studentId' => auth()->user()->student->student_id]) }}">Course Schedule View</a></li>
                        </ul>
                    </li>
                    @endrole
                    @role('student')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span>Academic Result</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('academic-result.index', ['studentId' => auth()->user()->student->student_id]) }}">Academic Result View</a></li>
                        </ul>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <footer>
        <p class="text-center">Copyright © 2024 by MyKICT</p>
    </footer>

    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

    <script src="{{ asset('assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script>
    <script src="{{ asset('assets/js/calander.js') }}"></script>
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the toggle button and sidebar
            const toggleButton = document.getElementById('toggle_btn');
            const sidebar = document.getElementById('sidebar');

            // Toggle sidebar visibility on button click
            toggleButton.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        });
    </script>

</body>

<style>
    .container {
        padding-top: 80px;
    }

    .sidebar {
        display: none;
        transition: all 0.3s ease;
    }

    .sidebar.active {
        display: block;
    }

    body {
    background-color: white !important;
    }

</style>

</html>