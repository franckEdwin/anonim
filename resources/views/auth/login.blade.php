@extends('layouts.guest')
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Title -->
    <title>Anonim</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Anonim" />
    <meta name="author" content="" />
    <meta name="keywords" content="Anonim" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="resources/views/assets2/dist/images/logos/favicon.ico" />
    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="resources/views/assets2/dist/css/style.min.css" />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img src="resources/views/assets2/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
      <img src="resources/views/assets2/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-xl-7 col-xxl-8">
              <a href="" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                {{-- <img src="dist/images/logos/anonim.png" width="180" alt=""> --}}
              </a>
              <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                <img src="dist/images/backgrounds/Alone-pana.svg" alt="" class="img-fluid" width="800">
              </div>
            </div>
            <div class="col-xl-5 col-xxl-4">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                <div class="col-sm-8 col-md-6 col-xl-9">
                  <h2 class="mb-3 fs-7 fw-bolder">Bienvenue sur Anonim 😎</h2>
                  <p class=" mb-9">Connecte toi si tu as déjà un compte !</p>
                  <!-- <div class="row">
                    <div class="col-6 mb-2 mb-sm-0">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="resources/views/assets2/dist/images/svgs/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                      </a>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="resources/views/assets2/dist/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                      </a>
                    </div>
                  </div> -->
                  <!-- <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div> -->
                  <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="mb-3">
                    <!-- <label class="form-label">{{ __('Adresse email') }}</label> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse email" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="mb-2">
                    <!-- <label class="form-label">
                        {{ __('Mot de passe') }}
                        @if (Route::has('password.request'))
                        <span class="form-label-description">
                            <a href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        </span>
                        @endif
                    </label> -->
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password" autocomplete="current-password">
                    </div>
                </div>
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <!-- <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="form-check-label">{{ __('Se souvenir de moi') }}</span>
                    </label>
                </div> -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Se connecter') }}</button>
                </div>

                <div class="text-muted mt-4">
    Pa encore de compte ? <a href="{{ url('register') }}" tabindex="-1">Créer un nouveau compte</a>
    </div>
                
            </div>
            
        </form>


             
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <!--  Import Js Files -->
    <script src="resources/views/assets2/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="resources/views/assets2/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="resources/views/assets2/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="resources/views/assets2/dist/js/app.min.js"></script>
    <script src="resources/views/assets2/dist/js/app.init.js"></script>
    <script src="resources/views/assets2/dist/js/app-style-switcher.js"></script>
    <script src="resources/views/assets2/dist/js/sidebarmenu.js"></script>
    
    <script src="resources/views/assets2/dist/js/custom.js"></script>
  </body>
</html>


@endsection