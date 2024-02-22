<div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="horizontal"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
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
          <ul class="navbar-nav quick-links d-none d-xl-flex">
        
            <li class="nav-item dropdown-hover d-none d-xl-block">
              <a class="nav-link strong" href="{{ url('viral') }}"> {{ __('main.nav_viral') }}</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-xl-block">
              <a class="nav-link" href="{{ url('random') }}"> {{ __('main.nav_random') }}</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="{{ url('/') }}">  {{ __('main.nav_latests') }}</a>
              </li>
              <li class="nav-item dropdown-hover d-none d-xl-block">
                {{-- <a class="nav-link" href="app-email.html">Email</a> --}}

                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal--write--story"> {{ __('main.nav_submit_a_story') }} </a>
              </li>
          </ul>
          <div class="d-block d-xl-none">
            <a href="index.html" class="text-nowrap nav-link">
              <img src="../../dist/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
          </div>
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
        
      
    </div>


    @if (Auth::check())
    <!-- show notifications only if user is logged in -->
    {{-- @include('layouts.notifications') --}}
    {{-- @include('layouts.notification') --}}
@endif

<!-- form in modal write a story -->
@include('layouts.modal.form_write_story')

