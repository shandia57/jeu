console.log("coucou tu shmerle ? ");

import * as utils from "../librairie/utils.js";


document.getElementById("searchbar").addEventListener("keyup", (e) => {
    utils.searchValueFromSearchbar(e, "dataUser");
})

document.getElementById("selectFilter").addEventListener("change", (e) => {
    utils.filterFromSelectInput(e, "tbody", 0, 1);
})

document.getElementById("btnDelete").addEventListener("click", (e) => {
    if (confirm("Êtes vous sûr de vouloir supprimer cet utilisateur ? ")) {
        e.target.value = true;
    }
})


