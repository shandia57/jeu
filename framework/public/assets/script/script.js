console.log("it's like a bird, but, it's not a bird");

function setInfoUser(target) {
    document.getElementById("id_user").value = target.children[0].innerText;
    document.getElementById("username").innerText = target.children[1].innerText;
    document.getElementById("firstName").value = target.children[2].innerText;
    document.getElementById("lastName").value = target.children[3].innerText;
    document.getElementById("mail").value = target.children[4].innerText;

    let roles = document.getElementById("roles")
    if (target.children[5].innerText === "ROLES_ADMIN") {
        roles.options[roles.selectedIndex] = roles.options[0]
    } else if (target.children[5].innerText === "USER") {
        roles.options[roles.selectedIndex] = roles.options[1];
    }
}

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


})
