// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

// Toggle navigation and main sections
toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

// Dropdown toggle function
function toggleDropdown() {
  const dropdownMenu = document.getElementById("dropdownMenu");
  // Toggle display between 'none' and 'block'
  dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
  // If clicked outside the dropdown button and dropdown
  if (!event.target.matches(".user-info button") && !event.target.closest("#dropdownMenu")) {
    const dropdowns = document.getElementsByClassName("dropdown-menu");
    for (let i = 0; i < dropdowns.length; i++) {
      const openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};

// Ensure that the toggleDropdown function is called when the button is clicked
document.querySelector(".user-info button").onclick = function (event) {
  event.stopPropagation(); // Prevent click event from bubbling up to window
  toggleDropdown();
};
