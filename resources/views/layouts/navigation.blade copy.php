<header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            @if (!empty(App\Models\Settings::find('logo_image')->value))
                <img src="{{ asset('storage/app/public/images/logo/' . App\Models\Settings::find('logo_image')->value) }}"
                    title="{{ $site_name }}" height="32px">
            @else
                {{ $site_name }}
            @endif
        </a>

        <div class="navbar-nav flex-row order-md-last">
            @if (Auth::check())
                <!-- Notifications -->
                <div class="nav-item dropdown d-md-flex me-3">
                    <a href="javascript:void(0);" onclick="markAsRead()" class="nav-link px-0" data-bs-toggle="modal"
                        data-bs-target="#notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        @if (Auth::user()->notification_count() >= 1)
                            <span class="badge badge-pill bg-red" id="notify">
                                {{ Auth::user()->notification_count() }}
                            </span>
                        @endif
                    </a>
                </div>
                <!-- end Notifications -->



                <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="user-profile-img">
                                @if (!empty(Auth::user()->avatar))
                                    <img src="{{ asset('storage/app/public/images/avatar/' . Auth::user()->avatar) }}"
                                        class="rounded-circle" width="35" height="35" alt="" />
                                @else
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                        aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative" data-simplebar>
                            <div class="py-3 px-7 pb-0">
                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                            </div>
                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                @if (!empty(Auth::user()->avatar))
                                    <img src="{{ asset('storage/app/public/images/avatar/' . Auth::user()->avatar) }}"
                                        class="rounded-circle" width="80" height="80" alt="" />
                                @else
                                    <span class="avatar avatar-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="rounded-circle" width="35"
                                            height="35" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                    </span>
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
                                
                                <a href="{{ url('profile/@') }}"
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
                                        <h6 class="mb-1 bg-hover-primary fw-semibold">Post enregistés</h6>
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
                                    @endhasrole


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
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">
                        <span class="nav-link-title d-none d-sm-block">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Se connecter') }}</button>
                        </span>
                    </a>
                </li>

            @endif
        </div>

        <div class="navbar-collapse collapse" id="navbar-menu" style="">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
            <a class="nav-link strong dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button"
              aria-expanded="false">
              
              <span class="nav-link-title">
                {{ __('main.nav_explore') }}
              </span>
            </a>

            <div class="dropdown-menu">
              <div class="dropdown-menu-columns">
                <div class="dropdown-menu-column">

                  <a class="dropdown-item text-reset strong" href="#" data-bs-toggle="modal"
                    data-bs-target="#modal--write--story">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24"
                      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <circle cx="12" cy="12" r="9" />
                      <line x1="9" y1="12" x2="15" y2="12" />
                      <line x1="12" y1="9" x2="12" y2="15" />
                    </svg>
                    Faire un post
                  </a>

                  <div class="dropdown-divider"></div>

                  <!-- Categories -->
                  <div class="dropend">
                    <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown"
                      role="button" aria-expanded="false">
                      {{ __('main.nav_categories') }}
                    </a>
                    <div class="dropdown-menu">
                      @forelse($categories as $category)
                      <a class="dropdown-item" href="{{ route('navCategories', $category->slug) }}">
                        {{ $category->name }}
                      </a>
                      @empty
                      <span class="dropdown-item">
                        {{ __('main.there_are_no_categories') }}
                      </span>
                      @endforelse
                    </div>
                  </div>
                  <!-- end Categories -->

                  <!-- Pages -->
                  <div class="dropend">
                    <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown"
                      role="button" aria-expanded="false">
                      {{ __('main.nav_pages') }}
                    </a>
                    <div class="dropdown-menu">
                      @forelse($pages as $page)
                      <a href="{{ url('page/'.$page->slug) }}" class="dropdown-item text-truncate">
                        {{ $page->title }}
                      </a>
                      @empty
                      <span class="dropdown-item">
                        {{ __('main.there_are_no_pages') }}
                      </span>
                      @endforelse
                    </div>
                  </div>
                  <!-- end Pages -->

                </div>
              </div>
            </div>
          </li>
                </ul>

                <div class="ms-md-auto ps-md-2 py-2 py-md-0 me-md-2 order-first order-md-last flex-grow-1">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                            </span>
                            <input type="text"
                                class="form-control form-control-rounded form-control-dark @error('key') is-invalid @enderror"
                                name="key" value="{{ old('key') }}" type="search"
                                placeholder="{{ __('main.nav_search') }}" aria-label="Search in website">

                            @error('key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>




@if (Auth::check())
    <!-- show notifications only if user is logged in -->
    @include('layouts.notifications')
@endif

<!-- form in modal write a story -->
@include('layouts.modal.form_write_story')
