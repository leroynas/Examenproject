require('./bootstrap');

const button = document.querySelector('.toggle-menu');
const icon = document.querySelector('.toggle-menu i');
const nav = document.querySelector('.tfe-sidebar');
const main = document.querySelector('.tfe-main');

button.onclick = function() {
    if (nav.classList.contains('hidden')) {
        anime({ targets: nav, translateX: 0, easing: 'easeInOutExpo', duration: 400 });
        anime({ targets: main, paddingLeft: 260, easing: 'easeInOutExpo', duration: 400 });
    } else {
        anime({ targets: nav, translateX: -260, easing: 'easeInExpo', duration: 400 });
        anime({ targets: main, paddingLeft: 0, easing: 'easeInExpo', duration: 400 });
    }
    nav.classList.toggle('hidden');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-times');
}

