<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Πρακτική Άσκηση ΑΤΕΙΘ Τμ. Πληροφορικής</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container px-2">
                <div class="navbar-nav mx-auto mr-lg-0" id="secondaryNavbar">
                    @auth
                        <div class="nav-item dropdown mr-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->username }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <h6 class="dropdown-header font-weight-normal">Manage Account</h6>
                                @if (auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('company.dashboard') }}">Προφίλ</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-fw"></i> Έξοδος</button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    @guest
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt fa-fw"></i> Είσοδος</a>
                        <a class="nav-link border-left" href="#" data-toggle="modal" data-target="#registerModal"><i class="fas fa-user-plus"></i> Εγγραφή</a>
                    @endguest
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ request()->path() === '/' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('home') }}">Αρχική <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Πληροφορίες
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ request()->path() === 'requirements' ? 'active' : ''}}" href="{{ route('requirements') }}">Προϋποθέσεις</a>
                                <a class="dropdown-item {{ request()->path() === 'guides' ? 'active' : ''}}" href="{{ route('guides') }}">Οδηγοί Πρακτικής Άσκησης</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item {{ request()->path() === 'companies' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('companies.index') }}">Φορείς Απασχόλησης</a>
                        </li>
                        <li class="nav-item {{ request()->path() === 'announcements' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('announcements.index') }}">Ανακοινώσεις</a>
                        </li>
                        <li class="nav-item {{ request()->path() === 'contact' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('contact') }}">Επικοινωνία</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    @yield('banner')
    
    <main class="section flex-grow-1">
        @yield('content')
    </main>

    <footer id="site-footer" class="bg-dark">
        <div class="container">
            <div class="row mb-4" id="main-footer">
                <div class="col-md-7 col-lg-8 mb-5 mb-lg-0">
                    <h5 class="mb-3">Χρήσιμοι Σύνδεσμοι</h5>
                    <a href="https://www.espa.gr/el/Pages/default.aspx"><img src="{{ asset('img/logo_espa_2013.jpg') }}" class="img-fluid mb-4" alt=""></a>
				    <a href="http://praktiki.teithe.gr/"><img src="{{ asset('img/praktiki_full.jpg') }}" class="img-fluid" alt=""></a>
                </div>
                <div class="col-md-5 col-lg-4">
                    <h5 class="mb-3">Στοιχεία Eπικοινωνίας</h5>
                    <p class="lead">Γραφείο Πρακτικής Άσκησης</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt fa-fw"></i>  Αλεξάνδρειο ΤΕΙ Θεσσαλονίκης</li>
                        <li class="ml-3">Σχολή Τεχνολογικών Εφαρμογών</li>
                        <li class="ml-3">Τμήμα Μηχανικών Πληροφορικής Τ.Ε - 1ος όροφος</li>
                        <li class="ml-3">Τ.Θ. 141, Σίνδος</li>
                        <li class="ml-3">Τ.Κ. 57400 - Θεσσαλονίκης</li>
                    </ul>
                    <p><i class="fas fa-phone-alt fa-fw"></i><span class="ml-2">2310 - 013 414</span></p>
                    <p><i class="far fa-envelope fa-fw"></i><span class="ml-2">placemnt@it.teithe.gr</span></p>
                </div>
            </div>
            <div class="row" id="sub-footer">
				<div class="col-md-12 text-center">
					<div class="copyright">
						<p class="mb-1">
                            Copyright &copy; 2018 - <script>document.write(new Date().getFullYear());</script> <a href="http://www.it.teithe.gr" class="text-info" target="_blank">Τμήμα Μηχανικών Πληροφορικής ΑΤΕΙΘ</a>, All rights reserved.</p>
						<p>Created by Νικολόπουλος Δημήτριος | <a href="https://getbootstrap.com/" class="text-reset" target="_blank">Built with Bootstrap 4</a></p>
					</div>
				</div>
				<div class="col-lg-6">
				</div>
			</div>
        </div>
    </footer>

    <!-- Login Modal -->
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
    
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Εγγραφή</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('img/register_icon.png') }}" class="img-fluid" alt="...">
                    <p class="">Για να εγγραφείτε στο σύστημα, επιλέξτε την κατηγορία χρήστη που ανήκετε:</p>
                    <a href="{{ route('companies.create') }}" class="btn btn-outline-primary">Φορέας Απασχόλησης</a>
                    <a href="{{ route('graduates.create') }}" class="btn btn-outline-primary">Απόφοιτος Τμήματος</a>
                    <hr>
                    <p>Σημείωση: Οι <u><b>Προπτυχιακοί Φοιτητές</b></u> δεν χρειάζεται να συνδεθούν στο σύστημα για την έναρξη της Πρακτικής τους Άσκησης</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')

    
    @if (session('authError'))
        //js function that will open hidden login modal
        <script>
            $('#loginModal').modal('show');
            var message =
                "<div class='alert alert-danger' role='alert'>" +
                    "<i class='fas fa-times-circle'></i> {{ session('authError') }}" +
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

    @if ($errors->edit_job->any())
        <script>
            $('#editJobModal').modal('show');
        </script>
    @endif
</body>
</html>