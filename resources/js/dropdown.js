document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const navMenu = document.querySelector('nav ul');

    if (!menuIcon || !navMenu) {
        console.error("Menu icon or navigation menu not found!");
        return;
    }

    menuIcon.addEventListener('click', function () {
        navMenu.classList.toggle('show');

        // Ensure menu closes when clicking outside
        document.addEventListener('click', function (event) {
            if (!navMenu.contains(event.target) && event.target !== menuIcon) {
                navMenu.classList.remove('show');
            }
        });
    });
});



