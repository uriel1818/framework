
class Sidebar {
    constructor(sbar, btn) {
        this.element = document.getElementById(sbar);
        this.button  = document.getElementById(btn);
        this.addListeners();
    }

    /**
     * Abro el sidebar
     */
    open(){
        this.element.style.display = "block";
        this.button.innerHTML = "&#88;";
        this.button.style.backgroundColor = "red"
    }

    /**
     * Cierro el sidebar
     */
    close(){
        this.element.style.display = "none";
        this.button.innerHTML = "&#8801";
        this.button.style.backgroundColor = ""
    }
    
    /**
     * Verifica si está abierto o cerrado
     */
    openClose() {
        if (!this.element.style.display || this.element.style.display == "none") {
            this.open();
        }
        else {
            this.close();
        }
    }

    /**
     * Agrego los eventos para el sidebar
     */
    addListeners() {
        let openClose;
        this.button.addEventListener("click",  openClose = this.openClose.bind(this)  ,false); 
    }
}



/** Exporto una instancia de la clase */
let sb = new Sidebar('sidebar','menu_button');
export default {sb};