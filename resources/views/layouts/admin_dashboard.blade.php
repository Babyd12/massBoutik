<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Mass Boutik')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">


    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    {{-- Bootstrap css --}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                

                {{-- sidebar --}}
                <div class="container-fluid">
                  <div class="row flex-nowrap">
                      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                              <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                  <span class="fs-5 d-none d-sm-inline">Menu</span>
                              </a>
                              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                               
                                  <li>
                                      <a href="{{route('dashboard')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                          <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> 
                                        </a>
                                      <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                          <li class="w-100">
                                              <a href="{{route('products.index')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Produit</span> </a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="#" class="nav-link px-0 align-middle">
                                          <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                                  </li>
                                  <li>
                                      <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                          <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>
                                      <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                          <li class="w-100">
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                          <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                                          <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                          <li class="w-100">
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                                          </li>
                                          <li>
                                              <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="#" class="nav-link px-0 align-middle">
                                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                                  </li>
                              </ul>
                              <hr>
                              <div class="dropdown pb-4">                                
                                  @auth                         
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                        <span class="d-none d-sm-inline mx-1">{{auth()->user()->full_name}}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
      
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Deconnexion</a></li>
                                    </ul>
                                  @endauth
                              </div>
                          </div>
                      </div>
                  
                  </div>
              </div>

                <main class="mt-6">
                    @yield('content')
                </main>

            
                <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
               
                {{-- footer --}}
                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
