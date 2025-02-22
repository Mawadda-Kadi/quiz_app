document.addEventListener('DOMContentLoaded', () => {
    const menuIcon = document.querySelector('.menu-icon');
    const navMenu = document.querySelector('nav ul');
    const mainElement = document.querySelector('main');

    if (menuIcon && navMenu && mainElement) {
        menuIcon.addEventListener('click', () => {
            navMenu.classList.toggle('show');

            // Adjust main padding to push content down when menu opens
            if (navMenu.classList.contains('show')) {
                mainElement.style.paddingTop = `${navMenu.clientHeight}px`;
            } else {
                mainElement.style.paddingTop = '0px';
            }
        });
    } else {
        console.error("Menu icon, navigation menu, or main element not found!");
    }
});


