console.log("Where is the papagei ? ");

import * as utils from "./../librairie/utils.js";


document.getElementById("searchbar").addEventListener("keyup", (e) => {
    // const tableRowData = document.getElementsByClassName("dataQuestion");
    // if (e.target.value.trim().length === 0) {
    //     for (let i = 0; i < tableRowData.length; i++) {
    //         tableRowData[i].style.display = "";
    //     }
    // } else {
    //     for (let i = 0; i < tableRowData.length; i++) {
    //         let tableData = tableRowData[i].getElementsByTagName("td");
    //         for (let j = 0; j < tableData.length; j++) {
    //             if (e.target.value.toLowerCase().trim() === tableData[j].innerText.toLocaleLowerCase()) {
    //                 tableRowData[i].style.display = "";
    //                 break;
    //             } else {
    //                 tableRowData[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
    utils.searchValueFromSearchbar(e, "dataQuestion");
})

document.getElementById("selectFilter").addEventListener("change", (e) => {
    // const tbody = document.getElementById("tbody");
    // let itemsArray = Array.prototype.slice.call(tbody.children);


    // if (e.target.value === "ascendant") {
    //     itemsArray.sort(function (a, b) {
    //         if (parseInt(a.children[0].innerText) < parseInt(b.children[0].innerText)) return -1;
    //         if (parseInt(a.children[0].innerText) > parseInt(b.children[0].innerText)) return 1;
    //         return 0;
    //     });
    // } else if (e.target.value === "descendant") {
    //     itemsArray.sort(function (a, b) {
    //         if (parseInt(a.children[0].innerText) > parseInt(b.children[0].innerText)) return -1;
    //         if (parseInt(a.children[0].innerText) < parseInt(b.children[0].innerText)) return 1;
    //         return 0;
    //     });
    // } else if (e.target.value === "az") {
    //     itemsArray.sort(function (a, b) {
    //         if (a.children[2].innerText.toLowerCase() < b.children[2].innerText.toLowerCase()) return -1;
    //         if (a.children[2].innerText.toLowerCase() > b.children[2].innerText.toLowerCase()) return 1;
    //         return 0;
    //     });
    // } else if (e.target.value === "za") {
    //     itemsArray.sort(function (a, b) {
    //         if (a.children[2].innerText.toLowerCase() > b.children[2].innerText.toLowerCase()) return -1;
    //         if (a.children[2].innerText.toLowerCase() < b.children[2].innerText.toLowerCase()) return 1;
    //         return 0;
    //     });
    // }


    // itemsArray.forEach(function (item) {
    //     tbody.appendChild(item);
    // });
    utils.filterFromSelectInput(e, "tbody", 0, 2);

})

document.getElementById("btnDelete").addEventListener("click", (e) => {
    if (confirm("Êtes vous sûr de vouloir supprimer cette question ? ")) {
        e.target.value = true;
    }
})
