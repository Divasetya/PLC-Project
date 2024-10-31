// JavaScript to handle the splash screen fade-out effect
window.onload = function() {
    // Set a timeout to fade out the splash screen after 3 seconds
    setTimeout(() => {
        // Add the fade-out class to initiate the transition
        document.getElementById('splashScreen').classList.add('fade-out');
    }, 3000); // Wait for 3 seconds

    // Set another timeout to completely hide the splash screen after fade-out
    setTimeout(() => {
        document.getElementById('splashScreen').style.display = 'none';
    }, 4000); // Wait for 4 seconds total, including the fade-out effect
};
