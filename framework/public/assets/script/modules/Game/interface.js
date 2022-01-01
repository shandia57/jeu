export function createButton(text) {
    let button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'btn btn-outline-info');
    button.innerText = text;
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


export function createInterfaceAnswers(answers) {
    let parrent = document.getElementById("containerModal");
    let row = createRow();

    for (let i = 0; i !== answers.length; i++) {


        let col = createCol();
        let button = createButton(answers[i].answer);
        col.appendChild(button);
        row.appendChild(col);

        if (row.children.length == 2) {
            parrent.appendChild(row);
            row = createRow();
        }
    }
}
export function createInterfaceSingleAnswer() {
    let parrent = document.getElementById("containerModal");

    let row = createRow();

    let col = createCol();
    let col2 = createCol();

    let button = createButton("Bonne réponse");
    let button2 = createButton("Mauvaise réponse");

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

export function sendMessage(userAnswer) {
    userAnswer ? console.log("Félécitation, c'est une bonne réponse") : console.log("Dommage, mauvaise réponse ! ");
}