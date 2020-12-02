<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πρακτική Άσκηση ΑΤΕΙΘ Τμ. Πληροφορικής</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.1/css/all.min.css') }}"></link>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"></link>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Navbar content -->
                <div class="collapse navbar-collapse navbars justify-content-end" id="secondaryNavbar">
                    <div class="navbar-nav flex-row">
                        <a class="nav-link pr-3" href="{{ route('login') }}">Είσοδος</a>
                        <a class="nav-link pl-3" href="{{ route('register') }}">Εγγραφή</a>
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
                                <a class="dropdown-item" href="#">Οδηγοί Πρακτικής Άσκησης</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Φορείς Απασχόλησης</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ανακοινώσεις</a>
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
</body>
</html>