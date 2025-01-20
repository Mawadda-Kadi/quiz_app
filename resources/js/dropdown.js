document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon'); // Select the menu icon
    const navMenu = document.querySelector('nav ul'); // Select the navigation menu (ul)

    // Ensure both elements exist in the DOM before attaching events
    if (menuIcon && navMenu) {
        menuIcon.addEventListener('click', () => {
            navMenu.classList.toggle('show'); // Toggle the "show" class
        });
    } else {
        console.error("Menu icon or navigation menu not found!");
    }
});
