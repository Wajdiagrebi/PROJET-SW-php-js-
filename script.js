document.addEventListener("DOMContentLoaded", function() {
    function validateForm() {
        let isValid = true;

        // Validate username
        const username = document.getElementById("name").value;
        const usernameError = document.getElementById("nameError");
        const usernamePattern = /^[A-Z][a-zA-Z0-9]*$/;
        if (!usernamePattern.test(username)) {
            usernameError.textContent = "Username must start with an uppercase letter.";
            isValid = false;
        } else {
            usernameError.textContent = "";
        }

        // Validate email
        const email = document.getElementById("email").value;
        const emailError = document.getElementById("emailError");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            emailError.textContent = "Please enter a valid email address.";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Validate password
        const password = document.getElementById("password").value;
        const passwordError = document.getElementById("passwordError");
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!passwordPattern.test(password)) {
            passwordError.textContent = "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one digit.";
            isValid = false;
        } else {
            passwordError.textContent = "";
        }

        return isValid;
    }

    const form = document.querySelector("form");
    form.onsubmit = function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    };
});


