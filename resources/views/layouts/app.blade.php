<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πρακτική Άσκηση ΑΤΕΙΘ Τμ. Πληροφορικής</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.1/css/all.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Navbar content -->
                <div class="collapse navbar-collapse navbars justify-content-end" id="secondaryNavbar">
                    <div class="navbar-nav flex-row">
                        @auth
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->username }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                                    <h6 class="dropdown-header">Manage Account</h6>
                                    <a class="dropdown-item" href="#"></a>
                                    @if (auth()->user()->role == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('company.dashboard') }}">Dashboard</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item btn btn-link"><i class="fas fa-sign-out-alt"></i> Έξοδος</button>
                                    </form>
                                </div>
                            </div>
                        @endauth

                        @guest
                            <a class="nav-link pr-3" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Είσοδος</a>
                            <a class="nav-link pl-3" href="{{ route('register') }}">Εγγραφή</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" width="192" height="80" alt="" loading="lazy">
                </a>
                <a class="navbar-brand d-none d-lg-block" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbars" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse navbars" id="mainNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Αρχική <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Πληροφορίες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('requirements') }}">Προϋποθέσεις</a>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Οδηγοί Πρακτικής Άσκησης</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('companies.index') }}">Φορείς Απασχόλησης</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('announcements.index') }}">Ανακοινώσεις</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Επικοινωνία</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="section">
        @yield('content')
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Σύνδεση</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="loginForm" action="{{ route('login') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="inputUsername" class="sr-only">Username</label>
                            <input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username" value="{{ old('username') }}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="rememberCheck">
                            <label class="custom-control-label" for="rememberCheck">Remember me</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Είσοδος</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @if (session('openLogin'))
        //js function that will open hidden login modal
        <script>
            $('#loginModal').modal('show');
            var message = 
                "<div class='alert alert-danger w-100' role='alert'>" +
                    "<i class='fas fa-times-circle'></i> {{ session('openLogin') }}" +
                "</div>";
            $(".modal-body").prepend(message);
        </script>
    @endif

    @if ($errors->company->any())
        <script>
            $('#editCompanyModal').modal('show');
        </script>
    @endif

    @if ($errors->job->any())
        <script>
            $('#addJobModal').modal('show');
        </script>
    @endif
</body>
</html>