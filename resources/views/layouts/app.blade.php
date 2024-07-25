<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Mass Boutik')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

    <!-- Font -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    
    @yield('css')
        
    <style>
      
        #sidebar  ul li ul li a {
            margin-left: 10%;
        }
    </style>
    <!-- Remote icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-50 text-black">

        <div class="container-fluid">
            <div class="row flex-nowrap">

                <!-- Sidebar -->
              
                @section('sidebar')
                    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                        <div id="sidebar" class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                            <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                <span class="fs-5 d-none d-sm-inline">Mass Boutik</span>
                            </a>
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-end align-items-sm-start "
                                id="menu">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> {{ __('messages.Dashboard' )}} </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"
                                        id="toggleArrow">
                                        <i class="fs-4 bi-grid"></i>
                                        <span class="ms-1 d-none d-sm-inline">{{ __('messages.Product management') }}</span>
                                        <i class="bi bi-arrow-down" id="arrowIcon"></i>
                                    </a>
                                    <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                        <li class="w-100" >
                                            <a href="{{ route('rays.index') }}" class="nav-link px-0 ">
                                                <i class="bi bi-windows"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Show rays') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-100 ml-8">
                                            <a href="{{ route('products.index') }}" class="nav-link px-0">
                                                <i class="bi bi-app-indicator"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Show products') }}</span>
                                            </a>
                                        </li>
                                        <li class="w-100 ml-8">
                                            <a href="{{ route('products.create') }}" class="nav-link px-0">
                                                <i class="bi bi-app-indicator"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Add product') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('unit-per-packs.index') }}" class="nav-link px-0">
                                                <i class="bi bi-layout-wtf"></i>
                                                <span
                                                    class="d-none d-sm-inline">{{ __('messages.Show unit per pack') }}</span>
                                            </a>
                                        </li>
                                        
                                        

                                    </ul>
                                </li>
                                <li>
                                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle"
                                        id="toggleArrow">
                                        <i class="fs-4  bi-box-seam"></i> <span
                                            class="ms-1 d-none d-sm-inline">{{ __('messages.Buys and Sells') }}</span>
                                    </a>
                                    <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                        <li class="w-100">
                                            
                                            <a href="{{ route('stocks.index') }}" class="nav-link px-0">
                                                <i class="bi bi-arrow-left-right"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Show buys and sells') }}</span>
                                            </a>
                                            
                                        </li>
                                        <li class="w-100">
                                            <a href="{{ route('stocks.create') }}" class="nav-link px-0">
                                                <i class="bi bi-journal-plus"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Add buys or sells') }}</span>
                                            </a>
                                            
                                        </li>
                                        <li class="w-100">
                                            <a href="{{ route('lends.create') }}" class="nav-link px-0">
                                                <i class="bi bi-journal-minus"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Add lend') }}</span>
                                            </a>                                           
                                        </li>
                                        <li>
                                            <a href="{{ route('lends.index') }}" class="nav-link px-0">
                                                <i class="bi bi-journal-text"></i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Show Borrowers') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle"
                                        id="toggleArrow">
                                        <i class="fs-4 bi-people"></i> <span
                                            class="ms-1 d-none d-sm-inline">{{ __('messages.Customers') }}</span>
                                        <i class="bi bi-arrow-down" id="arrowIcon"></i>
                                    </a>
                                    <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                                        <li class="w-100">
                                            <a href="{{ route('users.index') }}" class="nav-link px-0">
                                                <i class="bi bi-person-circle"> </i>
                                                <span class="d-none d-sm-inline">{{ __('messages.Show customers') }}</span>
                                            </a>

                                        </li>
                                        
                                    </ul>
                                </li>



                            </ul>
                            <hr>
                            
                            <div class="dropdown pb-4">
                                
                                <a href="#"
                           
                                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                    @auth
                                        <img src="{{ auth()->user()->image }}"alt="hugenerd" width="30" height="30" class="rounded-circle" >                                       
                                    @endauth
                                    
                                    <span class="d-none d-sm-inline mx-1"> @auth {{ auth()->user()->full_name }} @endauth
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                    aria-labelledby="dropdownUser1">
                                    <li><a class="dropdown-item" href=" {{ route('dashboard.profile') }} ">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @show

                <!-- Main Content -->
                <div class="col py-3">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        @yield('header')
                    </header>
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-body-tertiary text-center text-lg-start">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2024 Copyright:
                    <a class="text-body" href="https://massboutik.com/">MassBoutik.com</a>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </footer>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>


    <!-- DataTables JS -->
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Toggle arrow icon
            const toggleArrow = document.getElementById('toggleArrow');
            const arrowIcon = document.getElementById('arrowIcon');
            toggleArrow.addEventListener('click', function(event) {
                event.preventDefault();
                if (arrowIcon.classList.contains('bi-arrow-down')) {
                    arrowIcon.classList.remove('bi-arrow-down');
                    arrowIcon.classList.add('bi-arrow-up');
                } else {
                    arrowIcon.classList.remove('bi-arrow-up');
                    arrowIcon.classList.add('bi-arrow-down');
                }
            });

            // Initialize DataTables
            $('#data-table').DataTable();
        });
    </script>
    @yield('script')
</body>

</html>
