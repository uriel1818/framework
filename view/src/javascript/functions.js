var funtions = {
    copy: function(nodeId, parentId){
        let itm = document.getElementById(nodeId);
        let cln = itm.cloneNode(true);
        document.getElementById(parentId).appendChild(cln);
    }
}
