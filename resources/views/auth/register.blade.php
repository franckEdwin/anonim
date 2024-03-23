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
        <link id="themeColors" rel="stylesheet" href="resources/views/assets2/dist/css/style.min.css" />
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
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <div class="position-relative overflow-hidden radial-gradient min-vh-100">
                <div class="position-relative z-index-5">
                    <div class="row">
                        <div class="col-xl-7 col-xxl-8">
                            <a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                                {{-- <img src="resources/views/assets2/dist/images/logos/dark-logo.svg" width="180" alt=""> --}}
                            </a>
                            <div class="d-none d-xl-flex align-items-center justify-content-center"
                                style="height: calc(100vh - 80px);">
                                <img src="dist/images/backgrounds/Alone-pana.svg" alt="" class="img-fluid"
                                    width="800">
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-4">
                            <div
                                class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                                <div class="col-sm-8 col-md-6 col-xl-9">
                                    <h2 class="mb-3 fs-7 fw-bolder">Bienvenue sur Anonim 😎</h2>
                                    <p class=" mb-9">Pas encore de compte ?</p>

                                    <form id="registerForm" class="" action="{{ route('register') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-body">

                                            <div class="mb-3">

                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" placeholder="Nom d'utilisateur" required
                                                    autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">

                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" placeholder="Adresse email" required
                                                    autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="mb-3">

                                                <div class="input-group">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
    name="password" placeholder="Mot de passe" required autocomplete="new-password">


                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">

                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Confirmation mot de passe"
                                                    required autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="mb-3">
                                          <button id="registerButton" type="submit"
                                              class="btn btn-primary w-100" disabled>{{ __('Créer un compte') }}</button>
                                      </div>



                                        <div class="form-footer mt-3">
                                            <button type="button" class="btn btn-secondary w-100"
                                                onclick="generateRandomAccount()">Générer un compte aléatoire</button>
                                        </div>

                                        <div class="form-footer mt-3">
                                            <button type="button" class="btn btn-danger w-100"
                                                onclick="resetForm()">Réinitialiser</button>
                                        </div>

                                        <div class="form-footer">
                                          <label class="form-check">
                                              <input id="termsCheckbox" type="checkbox" class="form-check-input" required>
                                              <span class="form-check-label">Accepter les <a href="/anonim/page/conditions-dutilisation" tabindex="-1">conditions d'utilisation</a>.</span>
                                          </label>
                                      </div>
                                      

                                        <div class="text-muted mt-4">
                                            Déjà un compte ? <a href="{{ url('login') }}" tabindex="-1">Se connecter</a>
                                        </div>

                                </div>
                                </form>

                                <div class="modal fade" id="conditionsModal" tabindex="-1"
                                    aria-labelledby="conditionsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="conditionsModalLabel">Conditions à accepter
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Veuillez accepter les conditions suivantes :</p>
                                                <ul>
                                                    <li>Condition 1</li>
                                                    <li>Condition 2</li>
                                                    <!-- Ajoutez d'autres conditions au besoin -->
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="acceptConditionsBtn">Accepter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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


        <script>
            function afficherModalConditions() {
                $('#conditionsModal').modal('show');
            }

            function verifierConditionsEtSoumettreFormulaire() {
                var conditionsAcceptees = true; // Changez ceci en false si les conditions ne sont pas remplies

                if (conditionsAcceptees) {
                    document.getElementById('registerForm').submit();
                } else {
                    afficherModalConditions();
                }
            }

            document.getElementById('registerButton').addEventListener('click', verifierConditionsEtSoumettreFormulaire);
        </script>


<script>
  document.getElementById('termsCheckbox').addEventListener('change', function() {
      var registerButton = document.getElementById('registerButton');
      if (this.checked) {
          registerButton.removeAttribute('disabled');
      } else {
          registerButton.setAttribute('disabled', 'disabled');
      }
  });
</script>


<script>
    document.getElementById('password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var result = zxcvbn(password);
        var meter = document.getElementById('password-strength-meter');
        meter.innerHTML = 'Strength: ' + result.score + '/4';

        // Changez la couleur du texte en fonction de la force du mot de passe
        switch(result.score) {
            case 0:
                meter.style.color = 'red';
                break;
            case 1:
                meter.style.color = 'orange';
                break;
            case 2:
                meter.style.color = 'yellow';
                break;
            case 3:
                meter.style.color = 'lightgreen';
                break;
            case 4:
                meter.style.color = 'green';
                break;
            default:
                meter.style.color = 'black';
                break;
        }
    });
</script>








    </body>

    </html>
@endsection
