
function showHideMenu() {
    let element = document.getElementById('menu_lateral')
    let status = element.className;

    if (status == 'is-hidden') {
        status = 'column is-3';
    } else {
        status = 'is-hidden';
    }
    element.className = status;
}