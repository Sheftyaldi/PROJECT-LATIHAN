// document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('tbl');

    hamburger.addEventListener('click', function(){
        menu.classList.toggle('active')
        console.log(menu)
    });
// });