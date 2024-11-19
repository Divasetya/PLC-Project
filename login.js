// Get references to the container and the buttons
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Event listener for the "Sign Up" button in the toggle-right panel
registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

// Event listener for the "Sign In" button in the toggle-left panel
loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
