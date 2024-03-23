<div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="horizontal"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <!-- Header Start -->
        
      <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      
        <!-- Header Start -->
          
        <header class="app-header">
          <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-sm-none">
                  <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                      <i class="ti ti-menu-2"></i>
                  </a>
              </li>
              
              <li class="nav-item d-none d-sm-block">
                  <a href="{{ url('/') }}" class="text-nowrap nav-link">
                      <img src="{{ asset('dist/images/logos/anonim-logo.svg') }}" width="120" alt="">
                  </a>
              </li>
            </ul>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                  <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                  </a>
                  <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
  
                      <div class="navbar-nav flex-row order-md-last">
                          @if (Auth::check())
                              <!-- Notifications -->
  
                              
                              <li class="nav-item dropdown">
                                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="dist/images/svgs/icon-flag-fr.svg" alt="" class="rounded-circle object-fit-cover round-20">
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body" data-simplebar>
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                          <img src="dist/images/svgs/icon-flag-en.svg" alt="" class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                      </a>
                                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                          <img src="dist/images/svgs/icon-flag-fr.svg" alt="" class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">français (French)</p>
                                      </a>
                                    </div>
                                  </div>
                                </li>
                             
                              <li class="nav-item dropdown">
                                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-bell-ringing"></i>
                                    <div class="notification bg-primary rounded-circle"></div>
                                  </a>
                                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                      <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                      <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                    </div>
                                    
                                    <a class="" href="#"> @include('layouts.notification')</a>
                                    
                                    <div class="py-6 px-7 mb-1">
                                     
                                      <button class="btn btn-outline-primary w-100" onclick="window.location.href = '{{ url('notifications') }}'">{{ __('main.see_all_notifications') }}</button>
  
                                    </div>
                                   
                                  </div>
                                </li>
  
                              </li>
  
  
                               <!-- end Notifications -->
  
                               
  
                              
              
              
                              <div class="nav-item dropdown">
                                  <a class="nav-link pe-0" href="" id="drop1" data-bs-toggle="dropdown"
                                      aria-expanded="false">
                                      <div class="d-flex align-items-center">
                                          <div class="user-profile-img">
                                              @if (!empty(Auth::user()->avatar))
                                                  <img src="{{ asset('storage/app/public/images/avatar/' . Auth::user()->avatar) }}"
                                                      class="rounded-circle" width="35" height="35" alt="" />
                                              @else
                                              <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="35" height="35">
                                              @endif
                                          </div>
                                      </div>
                                  </a>
                                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                      aria-labelledby="drop1">
                                      <div class="profile-dropdown position-relative" data-simplebar>
                                          <div class="py-3 px-7 pb-0">
                                              <h5 class="mb-0 fs-5 fw-semibold">Profil utilisateur</h5>
                                          </div>
                                          <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                              @if (!empty(Auth::user()->avatar))
                                                  <img src="{{ asset('storage/app/public/images/avatar/' . Auth::user()->avatar) }}"
                                                      class="rounded-circle" width="80" height="80" alt="" />
                                              @else
                                              <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="80" height="80">
                                                 
                                              @endif
                                              <div class="ms-3">
                                                  @auth
                                                      <h5 class="mb-1 fs-3">{{ Str::limit(Auth::user()->name, 12) }}</h5>
                                                      <span class="mb-1 d-block text-dark">{{ Str::limit(Auth::user()->role, 12) }}</span>
                                                      <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                          <i class="ti ti-mail fs-4"></i> {{ Str::limit(Auth::user()->email) }}
                                                      </p>
                                                  @endauth
                                              </div>
                                          </div>
                                          <div class="message-body">
                                              <a href="{{ url('profile/@'.Auth::user()->name) }}"
                                                  class="py-8 px-7 mt-8 d-flex align-items-center dropdown-item">
                                                  <span
                                                      class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                      <img src="dist/images/svgs/icon-account.svg" alt="" width="24"
                                                          height="24">
                                                  </span>
                                                  <div class="w-75 d-inline-block v-middle ps-3">
                                                      <h6 class="mb-1 bg-hover-primary fw-semibold"> Mon Profil </h6>
                                                      <span class="d-block text-dark">Account Settings</span>
                                                  </div>
                                              </a>
                                              <a href="{{ url('favorites') }}"
                                                  class="py-8 px-7 d-flex align-items-center dropdown-item">
                                                  <span
                                                      class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                      <img src="dist/images/svgs/icon-inbox.svg" alt="" width="24"
                                                          height="24">
                                                  </span>
                                                  <div class="w-75 d-inline-block v-middle ps-3">
                                                      <h6 class="mb-1 bg-hover-primary fw-semibold">Post enregistrés</h6>
                                                      <span class="d-block text-dark">Messages & Emails</span>
                                                  </div>
                                              </a>
                                              <a href="{{ url('settings/edit') }}"
                                                  class="py-8 px-7 d-flex align-items-center dropdown-item">
                                                  <span
                                                      class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                      <img src="dist/images/svgs/icon-inbox.svg" alt="" width="24"
                                                          height="24">
                                                  </span>
                                                  <div class="w-75 d-inline-block v-middle ps-3">
                                                      <h6 class="mb-1 bg-hover-primary fw-semibold">Mon Compte</h6>
                                                      <span class="d-block text-dark">Messages & Emails</span>
                                                  </div>
                                              </a>
                                          </div>
                                          @hasrole('moderator')
                                              <div class="d-grid py-4 px-7 pt-8">
                                                  <div
                                                      class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                      <div class="row">
                                                          <div class="col-6">
                                                              <h5 class="fw-semibold text-dark">Only Modération Space</h5>
                                                              <a href="{{ url('admin/posts') }}"
                                                                  class="btn btn-primary text-white">Modération</a>
                                                          </div>
                                                          <div class="col-6">
                                                              <div class="m-n4">
                                                                  <img src="dist/images/backgrounds/unlimited-bg.png" alt=""
                                                                      class="w-100">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endhasrole
                                          @hasrole('admin')
                                              <div class="d-grid py-4 px-7 pt-8">
                                                  <div
                                                      class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                      <div class="row">
                                                          <div class="col-6">
                                                              <h5 class="fw-semibold text-dark">Only Admin Space</h5>
                                                              <a href="{{ url('admin') }}"
                                                                  class="btn btn-primary text-white">Administration</a>
                                                          </div>
                                                          <div class="col-6">
                                                              <div class="m-n4">
                                                                  <img src="dist/images/backgrounds/unlimited-bg.png" alt=""
                                                                      class="w-100">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endhasrole
                                          <div class="d-grid py-4 px-7 pt-8">
                                              <a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                  class="btn btn-outline-primary">Se Déconnecter</a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                  @csrf
                                              </form>
                                          </div>
              
                                      </div>
                                  </div>
                              </div>
                          @else
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ url('login') }}">
                                          <button type="submit" class="btn btn-danger fs-2 fw-semibold lh-sm">{{ __('Se connecter') }}</button>
                                  </a>
                              </li>
              
                          @endif
                      </div>
  
                      
                  </ul>            
                  </div>
                    </li>
                  </ul>
                </div>
            </div>
          </nav>
        </header>
          
          <!-- Header End -->
          
        <!-- Sidebar Start -->
        
        <aside class="left-sidebar">
          <!-- Sidebar scroll-->
          <div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar container-fluid">
              <ul id="sidebarnav" class="in">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">Home</span>
                </li>
                
                {{-- <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="{{ url('viral') }}" aria-expanded="false">
                    <span class="rounded-3">
                      <i class="ti ti-archive"></i>
                    </span>
                    <span class="hide-menu">{{ __('main.nav_viral') }}</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="{{ url('random') }}" aria-expanded="false">
                    <span class="rounded-3">
                      <i class="ti ti-archive"></i>
                    </span>
                    <span class="hide-menu">{{ __('main.nav_random') }}</span>
                  </a>
                </li>

                <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                    <span class="rounded-3">
                      <i class="ti ti-archive"></i>
                    </span>
                    <span class="hide-menu">{{ __('main.nav_latests') }}</span>
                  </a>
                </li> --}}

                




              </ul>
              {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded d-block d-lg-none">
                <div class="d-flex">
                  <div class="unlimited-access-title">
                    <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Unlimited Access</h6>
                    <button class="btn btn-primary fs-2 fw-semibold lh-sm">Signup</button>
                  </div>
                  <div class="unlimited-access-img">
                    <img src="../../dist/images/backgrounds/rocket.png" alt="" class="img-fluid">
                  </div>
                  
                </div>
              </div> --}}
              
            </nav>
            <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
         
        </aside>
        
        <!-- Sidebar End -->
        
      
        
        <!-- Main wrapper -->
        
        <div class="body-wrapper">
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 d-flex align-items-stretch">
                
              </div>
              
              
             
             
             
             
             
             
            </div>
          </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
      </div>
        
      
    </div>

    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="modal" data-bs-target="#modal--write--story" aria-controls="offcanvasExample">
        <i class="ti ti-send fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Post Anonim"></i>
    </button>
     


    @if (Auth::check())
    <!-- show notifications only if user is logged in -->
    {{-- @include('layouts.notifications') --}}
    {{-- @include('layouts.notification') --}}
@endif

<!-- form in modal write a story -->
@include('layouts.modal.form_write_story')