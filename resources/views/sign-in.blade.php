<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Ruta dinámica para el CSS -->
        <link rel="stylesheet" href="{{ asset('../css/signIn.css') }}" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <title>Sign Up - Peaxie</title>
    </head>
    <body>
        <div class="container">
            <div class="titleContainer">
                <img class="signInImage" />
                <div class="textContainer">
                    <span class="line1">SIGN UP</span>
                    <span class="line2">TO CHAT</span>
                </div>
            </div>
            <form id="signInForm" method="POST">
                @csrf <!-- Token de seguridad para formularios en Laravel -->

                <label for="username" class="labels">Username</label><br />
                <input type="text" class="inputs" id="username" name="username" required /><br />

                <label for="email" class="labels">Email</label><br />
                <input type="email" class="inputs" id="email" name="email" required /><br />

                <label for="password" class="labels">Password</label><br />
                <div class="passwordContainer">
                    <input type="password" class="inputs" id="password" name="password" autocomplete="new-password" required />
                    <span class="togglePassword" onclick="togglePassword('password')">
                        <!-- Ruta dinámica para la imagen -->
                        <img src="{{ asset('/public/eye.png') }}" alt="Show/Hide Password" id="passwordIcon" />
                    </span>
                </div>

                <label for="confirmPassword" class="labels">Confirm Password</label><br />
                <div class="passwordContainer">
                    <input type="password" class="inputs" id="confirmPassword" name="password_confirmation" autocomplete="new-password" required />
                    <span class="togglePassword" onclick="togglePassword('confirmPassword')">
                        <!-- Ruta dinámica para la imagen -->
                        <img src="{{ asset('/public/eye.png') }}" alt="Show/Hide Password" id="confirmPasswordIcon" />
                    </span>
                </div>

                <div class="register">
                    <!-- Ruta dinámica para iniciar sesión -->
                    <a class="logIn" href="{{ route('../html/login') }}">
                        You already have an account?
                    </a>
                    <button type="submit" class="registerBtn">REGISTER</button>
                </div>
            </form>
        </div>
        <!-- Ruta dinámica para el archivo JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('../js/signIn.js') }}"></script>
    </body>
</html>
