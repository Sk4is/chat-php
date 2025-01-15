document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signInForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        let valid = true;
        const fields = [
            { id: "name", pattern: /.{1,}/, message: "El nombre no puede estar vacío." },
            { id: "email", pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, message: "El correo electrónico no es válido." },
            { id: "password", pattern: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, message: "La contraseña debe tener al menos 8 caracteres, una letra y un número." },
            { id: "confirmPassword", pattern: /.{1,}/, message: "Por favor, confirme la contraseña." },
        ];

        fields.forEach(function(field) {
            const input = document.getElementById(field.id);
            const errorElement = document.getElementById(`${field.id}Error`);
            input.classList.remove("invalid");
            if (errorElement) errorElement.textContent = "";
        });

        fields.forEach(function(field) {
            const input = document.getElementById(field.id);
            const errorElement = document.getElementById(`${field.id}Error`);
            if (!input.value.match(field.pattern)) {
                valid = false;
                input.classList.add("invalid");
                if (errorElement) errorElement.textContent = field.message;

                Swal.fire({
                    icon: 'error',
                    text: field.message,
                    confirmButtonText: 'Aceptar'
                });
            }
        });

        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirmPassword').value.trim();
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        if (password !== confirmPassword) {
            valid = false;
            document.getElementById('confirmPassword').classList.add("invalid");
            if (confirmPasswordError) confirmPasswordError.textContent = "Las contraseñas no coinciden.";

            Swal.fire({
                icon: 'error',
                text: "Las contraseñas no coinciden.",
                confirmButtonText: 'Aceptar'
            });
        } else {
            document.getElementById('confirmPassword').classList.remove("invalid");
            if (confirmPasswordError) confirmPasswordError.textContent = "";
        }

        if (valid) {
            Swal.fire({
                icon: 'success',
                title: '¡Te has registrado con éxito!',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = '../html/login.html';
            });
        }
    });
});
