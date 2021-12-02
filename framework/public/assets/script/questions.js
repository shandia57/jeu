console.log("Where is the papagei ? ");


let btn = document.getElementById("btnCreateAnswer").addEventListener("click", (e) => {

    let listAnswer = document.createElement("div");
    let labelAnswer = document.createElement("div");
    let label = document.createElement("label");
    let numberOfAnswer = document.getElementsByClassName("answer").length + 1;
    let div = document.createElement("div");
    let input2 = document.createElement('input');
    let label2 = document.createElement("label");
    let input = document.createElement("input");

    listAnswer.setAttribute("class", "listAnswer");
    labelAnswer.setAttribute("class", "labelAnswer");
    input.setAttribute("class", "form-control");
    input.setAttribute("type", "text");
    input.setAttribute("name", "answer[]");

    label.setAttribute("class", "form-label answer");
    label.innerText = "Réponse" + numberOfAnswer;
    div.setAttribute("class", "form-check form-switch");
    input2.setAttribute("class", "form-check-input");
    input2.setAttribute("type", "checkbox");
    input2.setAttribute("name", "validAnswer" + numberOfAnswer);
    label2.setAttribute("class", "form-check-label");
    label2.innerText = "Réponse valide";

    listAnswer.appendChild(labelAnswer);
    listAnswer.appendChild(input);

    labelAnswer.appendChild(label);
    labelAnswer.appendChild(div);
    div.appendChild(input2);
    div.appendChild(label2);

    e.target.parentNode.insertBefore(listAnswer, e.target)

});

function updateQuestion(data) {

    let level = document.getElementById("level");
    let dataValueOfLevel = data.parentNode.parentNode.children[2].innerText;

    for (let i = 0; i < level.children.length; i++) {
        if (level.children[i].value === dataValueOfLevel) {
            level.children[i].selected = true;
        }
    }

    document.getElementsByClassName("idQuestions")[0].value = data.parentNode.parentNode.children[0].innerText;
    document.getElementsByClassName("labelUpdate")[0].value = data.parentNode.parentNode.children[1].innerText;
    document.getElementsByClassName("questionUpdate")[0].value = data.parentNode.parentNode.children[3].innerText;
}



document.getElementById("searchbar").addEventListener("keyup", (e) => {
    const tableRowData = document.getElementsByClassName("dataQuestion");
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
            if (a.children[2].innerText.toLowerCase() < b.children[2].innerText.toLowerCase()) return -1;
            if (a.children[2].innerText.toLowerCase() > b.children[2].innerText.toLowerCase()) return 1;
            return 0;
        });
    } else if (e.target.value === "za") {
        itemsArray.sort(function (a, b) {
            if (a.children[2].innerText.toLowerCase() > b.children[2].innerText.toLowerCase()) return -1;
            if (a.children[2].innerText.toLowerCase() < b.children[2].innerText.toLowerCase()) return 1;
            return 0;
        });
    }


    itemsArray.forEach(function (item) {
        tbody.appendChild(item);
    });

})

document.getElementById("btnDelete").addEventListener("click", (e) => {
    if (confirm("Êtes vous sûr de vouloir supprimer cette question ? ")) {
        e.target.value = true;
    }
})
