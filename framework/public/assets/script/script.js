console.log("it's like a bird, but, it's not a bird");

function setInfoUser(target) {
    document.getElementById("id_user").value = target.children[0].innerText;
    document.getElementById("usernameTitle").innerText = target.children[1].innerText;
    document.getElementById("firstName").value = target.children[2].innerText;
    document.getElementById("lastName").value = target.children[3].innerText;
    document.getElementById("mail").value = target.children[4].innerText;

    let roles = document.getElementById("roles");
    if (target.children[5].innerText === "ROLES_ADMIN") {
        roles.options[roles.selectedIndex] = roles.options[0]
    } else if (target.children[5].innerText === "USER") {
        roles.options[roles.selectedIndex] = roles.options[1];
    }
}


document.getElementById("searchbar").addEventListener("keyup", (e) => {
    const tableRowData = document.getElementsByClassName("dataUser");
    if (e.target.value.trim().length === 0) {
        for (let i = 0; i < tableRowData.length; i++) {
            tableRowData[i].style.display = "";
        }
    } else {
        for (let i = 0; i < tableRowData.length; i++) {
            let tableData = tableRowData[i].getElementsByTagName("td");
            for (let j = 0; j < tableData.length; j++) {
                if (e.target.value.toLowerCase().trim() === tableData[j].innerText.toLocaleLowerCase()) {
                    tableRowData[i].style.display = "";
                    break;
                } else {
                    tableRowData[i].style.display = "none";
                }
            }
        }
    }
})

document.getElementById("selectFilter").addEventListener("change", (e) => {
    const tbody = document.getElementById("tbody");
    let itemsArray = Array.prototype.slice.call(tbody.children);


    if (e.target.value === "ascendant") {
        itemsArray.sort(function (a, b) {
            if (parseInt(a.children[0].innerText) < parseInt(b.children[0].innerText)) return -1;
            if (parseInt(a.children[0].innerText) > parseInt(b.children[0].innerText)) return 1;
            return 0;
        });
    } else if (e.target.value === "descendant") {
        itemsArray.sort(function (a, b) {
            if (parseInt(a.children[0].innerText) > parseInt(b.children[0].innerText)) return -1;
            if (parseInt(a.children[0].innerText) < parseInt(b.children[0].innerText)) return 1;
            return 0;
        });
    } else if (e.target.value === "az") {
        itemsArray.sort(function (a, b) {
            if (a.children[1].innerText.toLowerCase() < b.children[1].innerText.toLowerCase()) return -1;
            if (a.children[1].innerText.toLowerCase() > b.children[1].innerText.toLowerCase()) return 1;
            return 0;
        });
    } else if (e.target.value === "za") {
        itemsArray.sort(function (a, b) {
            if (a.children[1].innerText.toLowerCase() > b.children[1].innerText.toLowerCase()) return -1;
            if (a.children[1].innerText.toLowerCase() < b.children[1].innerText.toLowerCase()) return 1;
            return 0;
        });
    }


    itemsArray.forEach(function (item) {
        tbody.appendChild(item);
    });

})

document.getElementById("btnDelete").addEventListener("click", (e) => {
    if (confirm("Êtes vous sûr de vouloir supprimer cet utilisateur ? ")) {
        e.target.value = true;
    }
})


