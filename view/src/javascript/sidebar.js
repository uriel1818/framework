 class Sidebar {

    

    constructor(sbar, btn) {
        this.element = document.getElementById(sbar);
        this.button  = document.getElementById(btn);
        this.addListeners();
    }

    /**
     * Abro o cierro el sidebar
     */
    openClose() {
        if (!this.element.style.display || this.element.style.display == "none") {
            this.element.style.display = "block";
        }
        else {
            this.element.style.display = "none";
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


let sb = new Sidebar('sidebar','menu_button');

export default {sb};