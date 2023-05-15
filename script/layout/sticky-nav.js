let navMenu = document.querySelector(".nav-bar-container");
let navMenuTop = navMenu.offsetTop + 40;
window.onscroll = function() {
    if (window.scrollY > navMenuTop) {
        navMenu.classList.add("sticky");
    } else {
        navMenu.classList.remove("sticky");
    }
};