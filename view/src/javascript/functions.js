/**
 * Funciones de w3css
 */

let sidebar = {    
    s: document.getElementById('sidebar'),
    show: function () {
        if(this.s.style.display == "none"){
            alert('Abrir');
        }
        else{
            alert("Cerrar");
        }
    }
}