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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        /* General */
        .card {
            box-shadow: 0 2px 1px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            transition: box-shadow 0.2s ease-in-out;
            border-top: 3px solid #8CDDCD;
        }

        .card .card-header {
            background-color: #ffffff;
        }

        .card .card-header h5 {
            margin-bottom: 0;
            color: #37474f;
            font-size: 0.9375rem;
            display: inline-block;
        }

        /* Bootstrap Overwrite */

        .btn-primary {
            color: #fff;
            background-color: #1abc9c;
            border-color: #1abc9c;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #159a80;
            border-color: #148f77;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0rem rgba(60, 198, 171, 0.5);
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus, .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0rem rgba(60, 198, 171, 0.5);
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #148f77;
            border-color: #12846e;
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
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
                    <a class="nav-link active" href=""><i class="fas fa-home fa-fw"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="far fa-file-alt fa-fw"></i> New Announcement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-list-ul fa-fw"></i> Students Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-list-ul fa-fw"></i> Graduates Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="far fa-chart-bar fa-fw"></i> Statistics</a>
                </li>
            </ul>
        </div>
        <div id="content-wrapper">
            @yield('content')
        </div>
    </div>
</body>

</html>