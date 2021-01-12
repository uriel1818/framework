let sidebar = {
    openClose: function () {
        let element = document.getElementById("sidebar");
        let status = element.style.display;
        if(status == "block"){
            element.style.display = "none";
        }else{
            element.style.display = "block";
        }
        console.log("status");
    },
}

