@extends('layouts.guest')
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Title -->
    <title>Mordenize</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
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
              <a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                {{-- <img src="resources/views/assets2/dist/images/logos/dark-logo.svg" width="180" alt=""> --}}
              </a>
              <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                <img src="dist/images/backgrounds/Alone-pana.svg" alt="" class="img-fluid" width="800">
              </div>
            </div>
            <div class="col-xl-5 col-xxl-4">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                <div class="col-sm-8 col-md-6 col-xl-9">
                  <h2 class="mb-3 fs-7 fw-bolder">Bienvenue sur Anonim 😎</h2>
                  <p class=" mb-9">Pas encore de compte ?</p>
                 
                  <form class="" action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
              
                <div class="mb-3">
                  
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="mb-3">
                    
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    

                            <div class="mb-3">
              
                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="off">
                    
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
             
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmation mot de passe" required autocomplete="off">
                  
                </div>
            </div>
                            
               
            
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Créer un compte') }}</button>
                </div>

                <div class="form-footer mt-3">
                    <button type="button" class="btn btn-secondary w-100" onclick="generateRandomAccount()">Générer un compte aléatoire</button>
                </div>

                <div class="form-footer mt-3">
                    <button type="button" class="btn btn-danger w-100" onclick="resetForm()">Réinitialiser</button>
                </div>

                {{-- <div class="form-footer">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div> --}}

                <div class="text-muted mt-4">
                    Déjà un compte ? <a href="{{ url('login') }}" tabindex="-1">Se connecter</a>
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

    <script>
      function togglePasswordVisibility(inputId) {
          var passwordInput = document.getElementById(inputId);
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
          } else {
              passwordInput.type = "password";
          }
      }
  
      function generateRandomAccount() {
          // Générer des valeurs aléatoires pour le nom et l'email seulement
          var randomName = "anonim" + Math.floor(Math.random() * 1000);
          var randomEmail = "anonim" + Math.floor(Math.random() * 1000) + "@anonim.social";
  
          // Remplir les champs du formulaire avec les valeurs générées
          document.getElementById("name").value = randomName;
          document.getElementById("email").value = randomEmail;
  
          // Ne pas remplir le champ de mot de passe pour permettre à l'utilisateur de le saisir manuellement
          document.getElementById("password").value = "";
          document.getElementById("password-confirm").value = "";
      }
  
      function resetForm() {
          // Réinitialiser les valeurs des champs du formulaire
          document.getElementById("name").value = "";
          document.getElementById("password").value = "";
          document.getElementById("password-confirm").value = "";
          document.getElementById("email").value = "";
      }
  </script>
  
  

  </body>
</html>

@endsection