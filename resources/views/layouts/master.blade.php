<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>i-Plan</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo-small.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="main-wrapper">

    @include('layouts.navbar')

        <div class="sidebar" id="sidebar">
            <div disabled class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        @role('admin')
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
                        @endrole
                        @if(auth()->user()->hasRole('advisor') || auth()->user()->hasRole('student'))
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Advising </span> <span
                            class="menu-arrow"></span></a>
                            <ul>
                                @role('advisor')
                                <li><a href="advisor/student-list">Student List</a></li>
                                <li><a href="{{ route('appointments.index') }}">Appointment List</a></li>                                
                                @endrole
                                @role('student')
                                <li><a href="{{ route('appointments.create') }}" class="btn btn-primary">Book an Appointment</a></li>
                                <li><a href="{{ route('appointments.myAppointments') }}">Appointment History</a></li>
                                @endrole
                            </ul>
                        </li>
                        @endif
                        <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Course</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('course.index') }}">Course List</a></li>
                                @role('admin')
                                <li><a href="{{ route('course.create') }}">Course Add</a></li>
                                @endrole
                            </ul>
                        </li>
                        @role('student')
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Course Schedule</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('student_course_schedule.index', ['studentId' => auth()->user()->student->student_id]) }}">Course Schedule View</a></li>
                            </ul>
                        </li>
                        @endrole
                        @role('student')
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span>Academic Result</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('academic-result.index', ['studentId' => auth()->user()->student->student_id]) }}">Academic Result View</a></li>
                            </ul>
                        </li>
                        @endrole
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        <footer>
            <p  class="text-center">Copyright © 2024 by MyKICT</p>
        </footer>
    </div>

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

    {{-- <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="assets/js/calander.js"></script>
    <script src="assets/js/circle-progress.min.js"></script> --}}

</body>

<style>
    .container {
    padding-top: 80px;
}
</style>


</html>
