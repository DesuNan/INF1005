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

// preview for courses on-click
let previewContainer = document.querySelector('.courses-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.courses-container .course').forEach(course => {
  course.onclick = () => {
    previewContainer.style.display = 'flex';
    let name = course.getAttribute('data-name');
    previewBox.forEach(preview => {
      let target = preview.getAttribute('data-target');
      if(name == target) {
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(preview => {
  preview.querySelector('.fa-times').onclick = () => {
    preview.classList.remove('active');
    previewContainer.style.display = 'none';
  };
});
