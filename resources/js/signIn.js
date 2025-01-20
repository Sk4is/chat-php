document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signInForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        let valid = true;
        const fields = [
            { id: "name", pattern: /.{1,}/, message: "Username field can't be empty." },
            { id: "email", pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, message: "Email is invalid." },
            { id: "password", pattern: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, message: "The password must contain 8 characters, 1 letter and 1 number." },
            { id: "confirmPassword", pattern: /.{1,}/, message: "Please, confirm the password." },
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
                    confirmButtonText: 'Confirm'
                });
            }
        });

        const password = document.getElementById('password').value.trim();
        const confirmPassword = document.getElementById('confirmPassword').value.trim();
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        if (password !== confirmPassword) {
            valid = false;
            document.getElementById('confirmPassword').classList.add("invalid");
            if (confirmPasswordError) confirmPasswordError.textContent = "The passwords doesn't match.";

            Swal.fire({
                icon: 'error',
                text: "The passwords doesn't match.",
                confirmButtonText: 'Confirm'
            });
        } else {
            document.getElementById('confirmPassword').classList.remove("invalid");
            if (confirmPasswordError) confirmPasswordError.textContent = "";
        }

        if (valid) {
            Swal.fire({
                icon: 'success',
                title: '¡Succesfully registered!',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = '../html/login.html';
            });
        }
    });
});

function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.querySelector(`#${inputId}Icon`);
    
    if (input.type === "password") {
        input.type = "text";
        icon.src = "/public/eyeHidden.png";
    } else {
        input.type = "password";
        icon.src = "/public/eye.png";
    }
}
