

function showHideMenu() {
    let menu = document.getElementById('menu_lateral')
    let navbarButton = document.getElementById('navbar-button');

    if (menu.className == 'menu is-hidden-mobile') {
        menu.className = 'menu';
        navbarButton.className = 'navbar-burger burger is-hidden-tablet is-active'
    } else {
        menu.className = 'menu is-hidden-mobile';
        navbarButton.className = "navbar-burger burger is-hidden-tablet"
    }
};


/**
 * Funciones de w3css
 */

function w3_open() {
  document.getElementById("sidebar").style.display = "block";
}
function w3_close() {
  document.getElementById("sidebar").style.display = "none";
}
