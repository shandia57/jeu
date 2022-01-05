import { Player } from "./../../class/Player.js";
import { JeuDeLoie } from "./../../class/JeuDeLoie.js";
import * as questions from "./../librairie/questions.js";

import * as answers from "./../librairie/answers.js";
import * as gameInterface from "./interface.js";


////// SCOKET IO
const socket = io("http://localhost:3000", {
    secure: true,
    transports: ['websocket', 'polling']
});


var users = []
var usersFromPhp = document.getElementsByName("users");
let game = new JeuDeLoie();
let player = new Player("Unkown", "Player");

for (let i = 0; i < usersFromPhp.length; i++) {
    users.push(usersFromPhp[i].value);
}

socket.on("init", (id) => {
    player.setId(id);
});

try {
    document.getElementById("testText").addEventListener("keyup", (e) => {
        if (e.key === "Enter") {
            let value = e.target.value;
            if (controlGoodUser(value)) {
                player.setUsername(value);
                socket.emit("players", [player.getId(), player.getUsername()]);
                socket.emit("numberMaxPlayers", users.length);
                gameInterface.deleteUsernameInput();
                gameInterface.createNavBarOfPlayers();
            }
            else document.getElementById("usernameHelp").innerText = "Mauvais username";
        }
    })
} catch (err) {
    console.log(err)
}

socket.on("startGame", (startGame) => {
    if (startGame[0] === true) {
        gameInterface.createDomGame();
        for (let i = 0; i < startGame[1].length; i++) {
            let newPlayer = new Player(startGame[1][i].username, "Player");
            newPlayer.setId(startGame[1][i].id);
            game.setPlayers(newPlayer);
        }
        game.setNumberOfActuelPlayers(game.getNumberPlayer());

        // SECOND STEP get Questions from the data base
        questions.getBlackQuestions("Green");
        questions.getBlackQuestions("Yellow");
        questions.getBlackQuestions("Blue");
        questions.getBlackQuestions("Orange");
        questions.getBlackQuestions("Red");
        questions.getBlackQuestions("Black");

        // THRID STEP set Questions to class game
        game.setQuestionsLevel1(JSON.parse(localStorage.getItem("Green")));
        game.setQuestionsLevel2(JSON.parse(localStorage.getItem("Yellow")));
        game.setQuestionsLevel3(JSON.parse(localStorage.getItem("Blue")));
        game.setQuestionsLevel4(JSON.parse(localStorage.getItem("Orange")));
        game.setQuestionsLevel5(JSON.parse(localStorage.getItem("Red")));
        game.setQuestionsLevel6(JSON.parse(localStorage.getItem("Black")));

        document.getElementById("currentPlayer").innerText = game.getCurrentPlayer().getUsername();
        document.getElementById("currentPlayerScore").innerText = game.getCurrentPlayer().getPoints();

        if (socket.id === startGame[2]) {
            alert("Veuillez choisir une couleur");
            let newButtonSearch = gameInterface.createBtnSearch();
            gameInterface.insertAfter(newButtonSearch, document.getElementById("searchbar"));
            document.getElementById("buttonSearch").addEventListener("click", () => {
                let buttonSearch = document.getElementById("buttonSearch");
                let getLevel = document.getElementById("searchbar").value;
                if (gameInterface.controlLevelQuestion(getLevel)) {

                    // Delete btn 
                    buttonSearch.parentNode.removeChild(buttonSearch);


                    // Search questions if empty array
                    if (game.getQuestionsWithLevel(getLevel).length === 0) {
                        getAndSetTheEmptyArrayQuestions(getLevel)
                    }


                    var questions = game.getQuestionsWithLevel(getLevel);
                    // FIRST STEP get a random index from 0 to length Of arrayQuestions
                    let index = game.getRandomIndex(questions.length);

                    // SECOND STEP get a random question
                    let singleQuestion = game.getSingleQuestion(index, questions);

                    // THIRD STEP get answer(s)
                    answers.getAnswers(singleQuestion.id_question);
                    game.setAnswers(JSON.parse(localStorage.getItem("answer")));

                    //// TAKE THE GOOD ANSWER
                    let goodAnswer = game.findGoodAnswer();
                    let array = [singleQuestion.question, game.getAnswers(), goodAnswer, getLevel, index];

                    // send it to the server for controle 
                    socket.emit("getQuestionsAndAnswers", array);


                } else {
                    alert("Incorrect, le niveau doit à choisir doit être l'un des niveaux suivants : vert, jaune bleu orange rouge noir");
                }
            })
        }
    }
})

socket.on("answerToTheQuestion", (dataQuestions) => {

    if (socket.id === dataQuestions[5]) {
        console.log("ID: socket", socket.id)
        document.getElementById("questionGame").innerText = dataQuestions[0];
        if (game.getAnswers().length === 1) {
            gameInterface.createInterfaceSingleAnswer(dataQuestions[1]);
        } else {
            gameInterface.createInterfaceAnswers(dataQuestions[1]);
        }

        // HEIGTH STEP ask to answer the question
        const btns = document.getElementsByClassName("btn-outline-info");
        for (let i = 0; i < btns.length; i++) {
            btns[i].addEventListener('click', () => {
                let rep = btns[i].value;
                let boolAnswer = game.isAGoodAnser(rep, dataQuestions[2]);

                socket.emit("player answered", [rep, boolAnswer, game.getNumberPointsToAttribute(dataQuestions[3])])

            })
        }


    } else {
        document.getElementById("questionGame").innerText = dataQuestions[0];
        if (dataQuestions[1].length === 1) {
            gameInterface.createInterfaceSingleAnswerForSpectator(dataQuestions[1]);
        } else {
            gameInterface.createInterfaceAnswersForSpectator(dataQuestions[1]);
        }
    }
});

socket.on("player answered", (answer) => {
    console.log(answer)
    if (answer[1] === true) {
        if (socket.id === answer[3]) {
            const btns = document.getElementsByClassName("btn-outline-info");
            for (let i = 0; i < btns.length; i++) {
                if (btns[i].value === answer[0]) {
                    btns[i].setAttribute("class", "btn btn-success");
                }
            }
        } else {
            const label = document.getElementsByClassName("answersSpectator");
            for (let i = 0; i < label.length; i++) {
                if (label[i].innerText === answer[0]) {
                    label[i].style = "color: green";
                }
            }
        }


        alert(game.getCurrentPlayer().getUsername() + " a gagné " + answer[2] + " points")
        game.getCurrentPlayer().addPoints(answer[2])
        document.getElementById("currentPlayerScore").innerText = game.getCurrentPlayer().getPoints();

    } else {
        if (socket.id === answer[3]) {
            const btns = document.getElementsByClassName("btn-outline-info");
            for (let i = 0; i < btns.length; i++) {
                if (btns[i].value === answer[4]) {
                    btns[i].setAttribute("class", "btn btn-success");
                } else if (btns[i].value === answer[0]) {
                    btns[i].setAttribute("class", "btn btn-danger");
                }
            }
        } else {
            const label = document.getElementsByClassName("answersSpectator");
            for (let i = 0; i < label.length; i++) {
                if (label[i].innerText === answer[4]) {
                    label[i].style = "color: green";
                } else if (label[i].innerText === answer[0]) {
                    label[i].style = "color: red";
                }
            }
        }

        alert(game.getCurrentPlayer().getUsername() + " a perdu " + answer[2] + " points")
        game.getCurrentPlayer().removePoints(answer[2]);

    }

    if (game.getCurrentPlayer().controlPointsOfTheCurrentPlayer()) {

        // messages 
        alert("Bravo ! " + game.getCurrentPlayer().getUsername() + " a gagné");

        game.setNumberOfActuelPlayers(game.getNumberOfActuelPlayers() - 1);
        game.getCurrentPlayer().setStatePlaying();
    }


    // Change the current player
    game.IncrementCurrentIndexPlayer();

    while (!game.getCurrentPlayer().getStatePlaying()) {
        game.IncrementCurrentIndexPlayer();
    }

    setTimeout(() => {
        if (socket.id === answer[3]) {
            socket.emit("endOfTurn", game.getCurrentIndexPlayer());
        }
    }, 3000);




})

socket.on("newTurn", (dataNewTurn) => {
    // RESET a part of the interface
    gameInterface.removeInterface();

    document.getElementById("currentPlayer").innerText = game.getCurrentPlayer().getUsername();
    document.getElementById("currentPlayerScore").innerText = game.getCurrentPlayer().getPoints();

    // delete the question from the array
    game.removeTheQuestion(dataNewTurn[1], dataNewTurn[2]);
    if (socket.id === dataNewTurn[0]) {
        let newButtonSearch = gameInterface.createBtnSearch();
        gameInterface.insertAfter(newButtonSearch, document.getElementById("searchbar"));
        alert("Veuillez choisir une couleur");


        document.getElementById("buttonSearch").addEventListener("click", () => {
            let buttonSearch = document.getElementById("buttonSearch");
            let getLevel = document.getElementById("searchbar").value;
            if (gameInterface.controlLevelQuestion(getLevel)) {

                // Delete btn 
                buttonSearch.parentNode.removeChild(buttonSearch);


                // Search questions if empty array
                if (game.getQuestionsWithLevel(getLevel).length === 0) {
                    getAndSetTheEmptyArrayQuestions(getLevel)
                }


                var questions = game.getQuestionsWithLevel(getLevel);
                // FIRST STEP get a random index from 0 to length Of arrayQuestions
                let index = game.getRandomIndex(questions.length);

                // SECOND STEP get a random question
                let singleQuestion = game.getSingleQuestion(index, questions);

                // THIRD STEP get answer(s)
                answers.getAnswers(singleQuestion.id_question);
                game.setAnswers(JSON.parse(localStorage.getItem("answer")));

                //// TAKE THE GOOD ANSWER
                let goodAnswer = game.findGoodAnswer();
                let array = [singleQuestion.question, game.getAnswers(), goodAnswer, getLevel, index];

                // send it to the server for controle 
                socket.emit("getQuestionsAndAnswers", array);


            } else {
                alert("Incorrect, le niveau doit à choisir doit être l'un des niveaux suivants : vert, jaune bleu orange rouge noir");
            }
        });



    }

})





function controlGoodUser(username) {
    return users.includes(username.trim().toLowerCase());
}


function getAndSetTheEmptyArrayQuestions(level) {
    switch (level.trim().toLowerCase()) {
        case "vert":
            game.setQuestionsLevel1(JSON.parse(localStorage.getItem("Green")));
            break;
        case "jaune":
            game.setQuestionsLevel2(JSON.parse(localStorage.getItem("Yellow")));
            break;
        case "bleu":
            game.setQuestionsLevel3(JSON.parse(localStorage.getItem("Blue")));
            break;
        case "orange":
            game.setQuestionsLevel4(JSON.parse(localStorage.getItem("Orange")));
            break;
        case "rouge":
            game.setQuestionsLevel5(JSON.parse(localStorage.getItem("Red")));
            break;
        case "noir":
            game.setQuestionsLevel6(JSON.parse(localStorage.getItem("Black")));
            break;
    }
}



function resetQuestions() {
    let questions = ["vert", "jaune", "bleu", "orange", "rouge", "noir"];
    for (let i = 0; i < questions.length; i++) {
        getAndSetTheEmptyArrayQuestions(questions[i])
    }
}












