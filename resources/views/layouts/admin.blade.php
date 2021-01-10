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

        /* Bootstrap Overwrite */
        
        .table {
            color: #37474f;
        }

        .table thead th {
            border-bottom: 1px solid #e2e5e8;
            background: #f6f6f6;
        }
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark header-navbar">
        <div class="container-fluid">
            <div class="mobile-header">
                <a class="navbar-brand m-0 mr-lg-3" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('img/teithe_logo.png') }}" width="45" height="45" alt="" loading="lazy"> Placements Admin
                </a>
                <button id="sidebarToggler" class="btn order-first order-lg-0"><i class="fas fa-bars"></i></button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainAdminNavbar"
                    aria-controls="mainAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="mainAdminNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">My Messages</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item btn btn-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="main-container">
        <div class="sidebar">
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
        <div id="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    
</body>

</html>