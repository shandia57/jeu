export function createButton(text) {
    let button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'btn btn-outline-info');
    button.innerText = text;
    return button;
}

export function createBtnSearch() {

    let button = document.createElement('button');
    let i = document.createElement('i');
    button.setAttribute("class", "btn btn-outline-secondary")
    button.setAttribute("type", "button")
    button.setAttribute("id", "buttonSearch")

    i.setAttribute("class", "fas fa-search");
    button.appendChild(i);
    return button;
}



export function createRow() {
    let row = document.createElement('div');
    row.setAttribute("class", "row justify-content-md-center")
    return row;
}

export function createCol() {
    let col = document.createElement('div');
    col.setAttribute("class", "col");
    return col;
}

export function insertLi(text) {
    let ul = document.getElementById("listOutput");
    let li = document.createElement('li');
    li.innerText = text;
    ul.appendChild(li);
}

export function createInterfaceAnswers(answers) {
    let parrent = document.getElementById("containerModal");
    let row = createRow();

    for (let i = 0; i !== answers.length; i++) {


        let col = createCol();
        let button = createButton(answers[i].answer);
        button.value = answers[i].answer;
        col.appendChild(button);
        row.appendChild(col);

        if (row.children.length == 2) {
            parrent.appendChild(row);
            row = createRow();
        }
    }
}
export function createInterfaceSingleAnswer(answers) {
    let parrent = document.getElementById("containerModal");

    let row = createRow();

    let col = createCol();
    let col2 = createCol();

    let button = createButton("Bonne réponse");
    button.value = answers[0].answer;
    let button2 = createButton("Mauvaise réponse");
    button2.value = "Mauvaise réponse";

    col.appendChild(button);
    col2.appendChild(button2);

    row.appendChild(col);
    row.appendChild(col2);
    parrent.appendChild(row);
}

export function controlLevelQuestion(levelChoose) {
    let levels = ["vert", "jaune", "bleu", "orange", "rouge", "noir"];
    return levels.includes(levelChoose.trim().toLowerCase());
}

export function sendMessageIfGoodAnswer(boolUserAnswer) {
    boolUserAnswer ? insertLi("Félécitation, c'est une bonne réponse") : insertLi("Dommage, mauvaise réponse ! ");
}

export function removeInterface() {
    let parrent = document.getElementById("containerModal");
    document.getElementById("questionGame").innerText = "Question";
    while (parrent.children.length > 0) {
        parrent.removeChild(parrent.firstChild);
    }
}

export function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

export function clearAllInterface() {
    while (document.body.children.length > 0) {
        document.body.removeChild(document.body.firstChild);
    }
}

export function createNavBarOfPlayers() {
    let header = document.createElement("header");
    let nav = document.createElement("nav");
    let p = document.createElement("p");
    let label = document.createElement("label");

    p.innerText = "Players connected : ";
    label.setAttribute("id", "numberOfUsers");
    label.innerText = "0";
    p.appendChild(label);
    nav.appendChild(p);
    header.appendChild(nav);
    document.body.appendChild(header);
}

export function deleteUsernameInput() {
    let main = document.body.children[0];
    while (main.children.length > 0) {
        main.removeChild(main.firstChild);
    }
}

