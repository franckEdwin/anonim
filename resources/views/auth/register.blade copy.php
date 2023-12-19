@extends('layouts.guest')
@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                {{ $site_name }}
            </a>
        </div>
        
        <form class="card card-md shadow" action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Créer un compte</h2>
                <div class="mb-3">
                    <!-- <label class="form-label">Nom d'utilisateur</label> -->
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nom d'utilisateur" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <!-- <label class="form-label">Adresse email</label> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    

                            <div class="mb-3">
                <!-- <label class="form-label">Mot de passe</label> -->
                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="off">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a href="javascript:void(0);" onclick="togglePasswordVisibility('password')">👁️</a>
                        </span>
                    </div>
                </div>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <!-- <label class="form-label">Confirmation mot de passe</label> -->
                <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmation mot de passe" required autocomplete="off">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a href="javascript:void(0);" onclick="togglePasswordVisibility('password-confirm')">👁️</a>
                        </span>
                    </div>
                </div>
            </div>
                            
                <!-- <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div> -->
            
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Create new Account') }}</button>
                </div>

                <div class="form-footer mt-3">
                    <button type="button" class="btn btn-secondary w-70" onclick="generateRandomAccount()">Générer un compte aléatoire</button>
                    <button type="button" class="btn btn-warning w-30" onclick="resetForm()">Réinitialiser</button>
                </div>

                <div class="form-footer">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div>
                
            </div>
        </form>

    </div>
    
    <div class="text-center text-muted mt-4">
    Tu as déjà un compte ? <a href="{{ url('login') }}" tabindex="-1">Connecte toi 😎</a>
    </div>
    
</div> 

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
        // Générer des valeurs aléatoires
        var randomName = "user" + Math.floor(Math.random() * 1000);
        var randomPassword = "password" + Math.floor(Math.random() * 1000);
        var randomEmail = "user" + Math.floor(Math.random() * 1000) + "@example.com";

        // Remplir les champs du formulaire avec les valeurs générées
        document.getElementById("name").value = randomName;
        document.getElementById("password").value = randomPassword;
        document.getElementById("password-confirm").value = randomPassword;
        document.getElementById("email").value = randomEmail;
    }

    function resetForm() {
    // Réinitialiser les valeurs des champs du formulaire
    document.getElementById("name").value = "";
    document.getElementById("password").value = "";
    document.getElementById("password-confirm").value = "";
    document.getElementById("email").value = "";
}
</script>
@endsectionz