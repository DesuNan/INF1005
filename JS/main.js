// const hamburger = document.querySelector('.hamburger-menu');
// const navMenu = document.querySelector('.nav-menu');

// hamburger.addEventListener('click', () => {
//     navMenu.classList.toggle('hide');
// });

window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle('sticky', window.scrollY > 0);
});

var menu = document.querySelector('.menu');
var menuBtn = document.querySelector('.menu-btn');
var closeBtn = document.querySelector('.close-btn');

menuBtn.addEventListener("click", () => {
    menu.classList.add('active');
});

closeBtn.addEventListener("click", () => {
    menu.classList.remove('active');
});
