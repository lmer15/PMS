document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const errorMessage = document.getElementById('error-message');
    const signUpErrorMessage = document.getElementById('signup-error-message');

    // Switch to the Sign-Up form
    signUpButton.addEventListener('click', () => {
        container.classList.add("right_panel_active");
        errorMessage.style.display = 'none'; // Hide sign-in error message when switching to sign-up
        signUpErrorMessage.style.display = 'none'; // Hide sign-up error message when switching to sign-up
    });

    // Switch to the Sign-In form
    signInButton.addEventListener('click', () => {
        container.classList.remove("right_panel_active");
        errorMessage.style.display = 'none'; // Hide sign-in error message when switching to sign-in
        signUpErrorMessage.style.display = 'none'; // Hide sign-up error message when switching to sign-in
    });

    // Handle error messages based on URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    if (error) {
        const errorMessages = {
            'empty_fields': 'Please fill in all fields.',
            'invalid_password': 'Invalid username or password. Please try again.',
            'user_not_found': 'User not found. Please check your username.',
            'password_mismatch': 'Passwords do not match.',
            'username_exists': 'Username already exists.',
            'email_exists': 'Email already exists. Please use a different email.',
            'server_error': 'An error occurred. Please try again later.',
        };

        const errorMessageText = errorMessages[error] || 'An unknown error occurred.';

        // Check error type to determine the correct form to show
        if (error === 'invalid_password' || error === 'user_not_found') {
            // These are sign-in related errors
            errorMessage.textContent = errorMessageText;
            errorMessage.style.display = 'block'; // Show sign-in error message
            container.classList.remove("right_panel_active"); // Ensure we're on the sign-in form
        } else {
            // These are sign-up related errors
            signUpErrorMessage.textContent = errorMessageText;
            signUpErrorMessage.style.display = 'block'; // Show sign-up error message
            container.classList.add("right_panel_active"); // Ensure we're on the sign-up form
        }
    }
});
