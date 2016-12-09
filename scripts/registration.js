"use strict";

document.querySelector('form').addEventListener('submit', function (e) {

    e.preventDefault();

    let passwords = document.querySelectorAll('input[type=password]');

    if (passwords[0].value == passwords[1].value) {
        this.submit();
    } else {
        document.querySelector('#info').innerText = 'Die Passwörter sind unterschiedlich!';
    }
}, true);
