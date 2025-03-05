function showAlert(message, icon = "error") {
    Swal.fire({
        title: icon === "success" ? "Success!" : "Attention!",
        html: message,
        icon: icon,
        confirmButtonText: "Accept"
    });
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPassword(password) {
    return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password);
}

function isValidUsername(username) {
    return /^[a-zA-Z0-9]{3,}$/.test(username);
}

function validateForm(formType) {
    let valid = true;
    let errorMessages = [];

    const fields = formType === "login" ? [
        { id: "email", pattern: isValidEmail, message: "Invalid email address." },
        { id: "password", pattern: val => val.length >= 8, message: "Password must be at least 8 characters long." }
    ] : formType === "register" ? [
        { id: "name", pattern: isValidUsername, message: "Username must be at least 3 characters long and contain only letters and numbers." },
        { id: "email", pattern: isValidEmail, message: "Invalid email address." },
        { id: "password", pattern: isValidPassword, message: "Password must be at least 8 characters, contain a letter, and a number." },
        { id: "password_confirmation", pattern: val => val.length > 0, message: "Please confirm your password." }
    ] : formType === "updatePassword" ? [
        { id: "update_password_current_password", pattern: val => val.length > 0, message: "Current password is required." },
        { id: "update_password_password", pattern: isValidPassword, message: "New password must be at least 8 characters, contain a letter, and a number." },
        { id: "update_password_password_confirmation", pattern: val => val.length > 0, message: "Please confirm your new password." }
    ] : [
        { id: "update_profile_name", pattern: isValidUsername, message: "Username must be at least 3 characters long and contain only letters and numbers." },
        { id: "update_profile_email", pattern: isValidEmail, message: "Invalid email address." }
    ];

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        input.classList.remove("invalid");

        const errorElement = document.getElementById(`${field.id}Error`);
        if (errorElement) {
            errorElement.textContent = "";
        }
    });

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorElement = document.getElementById(`${field.id}Error`);
        if (!field.pattern(input.value)) {
            valid = false;
            input.classList.add("invalid");
            if (errorElement) {
                errorElement.textContent = field.message;
            }
            errorMessages.push(field.message);
        }
    });

    if (formType === "register" || formType === "updatePassword") {
        const password = document.getElementById(formType === "register" ? "password" : "update_password_password").value.trim();
        const confirmPassword = document.getElementById(formType === "register" ? "password_confirmation" : "update_password_password_confirmation").value.trim();

        if (password !== confirmPassword) {
            valid = false;
            const confirmPasswordError = document.getElementById(formType === "register" ? "registerConfirmPasswordError" : "updatePasswordConfirmPasswordError");
            if (confirmPasswordError) {
                confirmPasswordError.textContent = "Passwords do not match.";
            }
            errorMessages.push("Passwords do not match.");
        }
    }

    if (!valid) {
        showAlert(errorMessages.join("<br>"));
    }

    return valid;
}

document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById('login');
    const registerForm = document.getElementById('register');
    const updatePasswordForm = document.getElementById('updatePassword');
    const updateProfileForm = document.getElementById('updateProfile');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm("login")) {
                showAlert("Login successful!", "success");
                setTimeout(() => {
                    loginForm.submit(); 
                }, 4000);
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm("register")) {
                showAlert("Registration successful!", "success");
                setTimeout(() => {
                    registerForm.submit();
                }, 4000);
            }
        });
    }

    if (updatePasswordForm) {
        updatePasswordForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm("updatePassword")) {
                showAlert("Password update successful!", "success");
                setTimeout(() => {
                    updatePasswordForm.submit();
                }, 4000);
            }
        });
    }

    if (updateProfileForm) {
        updateProfileForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateForm("updateProfile")) {
                showAlert("Profile format is correct, waiting for validation", "warning");
                setTimeout(() => {
                    updateProfileForm.submit();
                }, 4000);
            }
        });
    }
});
