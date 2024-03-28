const navToggle = document.querySelector('.nav-toggle');
const side_bar = document.querySelector('.side-bar');
const content = document.querySelector('.test-class2');
navToggle.addEventListener('click', () => {
    side_bar.classList.toggle('side-bar-hide');
    content.classList.toggle('test-class-vissible')
})