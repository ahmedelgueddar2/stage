<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #2980b9, #8e44ad); /* Dégradé de couleurs pour un arrière-plan professionnel */
            color: #fff; /* Texte en blanc pour contraster */
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #2980b9; /* Couleur de l'en-tête */
            color: white;
            text-align: center;
            border-radius: 10px 10px 0 0;
            font-size: 24px;
            padding: 15px 0;
        }
        .form-control {
            border-radius: 25px;
            padding: 15px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .btn-dark {
            border-radius: 25px;
            padding: 12px 25px;
            font-size: 18px;
            background-color: #2980b9; /* Couleur de fond du bouton */
            border: none; /* Supprimer la bordure */
        }
        .btn-dark:hover {
            background-color: #2c3e50; /* Couleur de fond au survol */
        }
        /* Style pour le texte "Sigital" */
        .login-text{
            font-style: italic;
            
        }
        .logo-text {
            font-style: italic;
             /* Texte en italique */
        }
        /* Style pour le texte "Remember Me" */
        .remember-me-label {
            color: grey; /* Couleur noire */
            font-style: italic; /* Texte en italique */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user-lock"></i> <span class="login-text">Login</span> - <span class="logo-text">Sigital</span>
                </div>

                <div class="card-body">
                

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label remember-me-label" for="remember"> <!-- Ajout de la classe CSS remember-me-label -->
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
