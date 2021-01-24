<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.1/css/all.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        /* General */

        .card .card-header h5 {
            margin-bottom: 0;
            color: #37474f;
            font-size: 0.9375rem;
            display: inline-block;
        }

        .page-header h6 {
            margin-bottom: 15px;
            color: #37474f;
        }

        .page-header:not(.breadcumb-sticky) .page-header-title + nav .breadcrumb > .breadcrumb-item a {
            font-size: 13px;
        }

        .page-header .page-header-title + nav .breadcrumb > .breadcrumb-item a {
            color: #373a3c;
            font-weight: 400;
        }

        .page-header .page-header-title + nav .breadcrumb > .breadcrumb-item:last-child a {
            color: #37474f;
            font-weight: 600;
        }

        .page-header .page-header-title + nav .breadcrumb > .breadcrumb-item::before {
            color: rgba(55, 58, 60, 0.6);
            font-size: 13px;
        }
          
    </style>
</head>

<body>
    <header id="headerNavbar">
        <nav class="navbar navbar-expand navbar-dark">
            <a class="navbar-brand m-0 mr-lg-3" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('img/teithe_logo.png') }}" alt="" loading="lazy"> <span>Placements Admin</span>
            </a>
            <button type="button" id="sidebarToggler" class="btn order-first order-lg-0" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="{{ route('logout') }}" method="post" class="ml-auto">
                @csrf
                <button type="submit" class="btn btn-sm logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </nav>
    </header>
    <div id="wrapper">
        <div id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcement.create') }}"><i class="far fa-file-alt fa-fw"></i> New Announcement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcements.index') }}"><i class="fas fa-list-ul fa-fw"></i> Announcements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-list-ul fa-fw"></i> Companies Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-list-ul fa-fw"></i> Students Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('graduates.index') }}"><i class="fas fa-list-ul fa-fw"></i> Graduates Table</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-chart-bar fa-fw"></i> Evaluation Results</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('statistics.student') }}"><i class="fas fa-chevron-right fa-xs"></i> Student</a>
                        <a class="dropdown-item" href="{{ route('statistics.graduate') }}"><i class="fas fa-chevron-right fa-xs"></i> Graduate</a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="main-container">
            <div id="content-wrapper">
                @yield('content')
            </div>
            <footer id="footer" class="clearfix py-2">
                <div class="float-xl-left mb-2 mb-xl-0">
                    Copyright &copy; 2018 - <script>document.write(new Date().getFullYear());</script> <a href="http://www.it.teithe.gr" class="text-info">Τμήμα Μηχανικών Πληροφορικής ΑΤΕΙΘ</a>, All rights reserved.
                </div>
                <div class="float-xl-right">Created by Νικολόπουλος Δημήτριος | <a href="https://getbootstrap.com/" class="text-reset">Built with Bootstrap</a></div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    
</body>

</html>