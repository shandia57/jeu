import { Player } from "./../../class/Player.js";
import { JeuDeLoie } from "./../../class/JeuDeLoie.js";
import * as questions from "./../librairie/questions.js";

import * as answers from "./../librairie/answers.js";
import * as gameInterface from "./interface.js";



//////////////////////// START GAME INITIALIZE

let players = [];
let MJ = new Player("Admin", "Admin");
let player1 = new Player("Shandia", "Player");
let player2 = new Player("Slykillah", "Player");
let player3 = new Player("Shimotsuki", "Player");
// let player4 = new Player("Kaiyo", "Player");
// let player5 = new Player("Toran", "Player");
// let player6 = new Player("Kenitoh", "Player");
let game = new JeuDeLoie();

////// SCOKET IO

const socket = io("http://localhost:3000", {
    secure: true,
    transports: ['websocket', 'polling']
});
socket.on("init", (id) => {
    player1.setId(id);
    socket.emit("players", [player1.getUsername(), player1.getId()]);
    socket.on("players", function (arrayPlayer) {
        console.log(arrayPlayer);
        for (let i = 0; i < arrayPlayer.length; i++) {
            players.push(arrayPlayer[i]);
        }
        document.getElementById("numberOfUsers").innerText = players.length;
    })


});

var messages = document.getElementById('messages');
var form = document.getElementById('form');
var input = document.getElementById('input');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (input.value) {
        socket.emit('chat message', input.value);
        input.value = '';
    }
});

socket.on('chat message', function (msg) {
    var item = document.createElement('li');
    item.textContent = msg;
    messages.appendChild(item);
    window.scrollTo(0, document.body.scrollHeight);
});




// FIRST STEP add players into the game

game.setPlayers(player1, player2, player3);
//  , player4, player5, player6
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

//////////////////////// GAME INITIALIZED
document.getElementById("currentPlayer").innerText = game.getCurrentPlayer().getUsername();
document.getElementById("currentPlayerScore").innerText = game.getCurrentPlayer().getPoints();

alert("Veuillez choisir une couleur");

document.getElementById("buttonSearch").addEventListener("click", () => {
    // play();
})

function play() {
    let buttonSearch = document.getElementById("buttonSearch");
    let getLevel = document.getElementById("searchbar").value;

    if (gameInterface.controlLevelQuestion(getLevel)) {

        // button removed to anticheat
        buttonSearch.parentNode.removeChild(buttonSearch);

        gameInterface.insertLi(game.getCurrentPlayer().getUsername() + " a choisi le niveau : " + getLevel);

        // Search questions
        if (game.getQuestionsWithLevel(getLevel).length === 0) {
            getAndSetTheEmptyArrayQuestions(getLevel)
        }

        var questions = game.getQuestionsWithLevel(getLevel);

        // FOURTH STEP get a random index from 0 to length Of arrayQuestions
        let index = game.getRandomIndex(questions.length);

        // FITH STEP get a random question
        let singleQuestion = game.getSingleQuestion(index, questions);
        document.getElementById("questionGame").innerText = singleQuestion.question;

        // SIXTH STEP get answer(s)
        answers.getAnswers(singleQuestion.id_question);
        game.setAnswers(JSON.parse(localStorage.getItem("answer")));


        // SEVENTH STEP control the length of the arrayAnswers
        if (game.getAnswers().length === 1) {
            gameInterface.createInterfaceSingleAnswer(game.getAnswers());
        } else {
            gameInterface.createInterfaceAnswers(game.getAnswers());
        }

        //// FOUND THE GOOD ANSWER
        let goodAnswer = game.findGoodAnswer();
        console.log("answer : ", goodAnswer);


        // HEIGTH STEP ask to answer the question
        const btns = document.getElementsByClassName("btn-outline-info");
        for (let i = 0; i < btns.length; i++) {
            btns[i].addEventListener('click', () => {
                let rep = btns[i].value;

                let boolAnswer = game.isAGoodAnser(rep, goodAnswer);
                gameInterface.sendMessageIfGoodAnswer(boolAnswer);

                // get and set the points to the current player !

                if (boolAnswer) {
                    game.getCurrentPlayer().setPoints(game.getNumberPointsToAttribute(getLevel))

                    // message
                    gameInterface.insertLi(game.getCurrentPlayer().getUsername() + " a gagné : " + game.getNumberPointsToAttribute(getLevel));

                } else {
                    game.getCurrentPlayer().setPoints(0);
                }


                // Control if the current player won 
                if (game.getCurrentPlayer().controlPointsOfTheCurrentPlayer()) {

                    // messages 
                    alert("Bravo ! " + game.getCurrentPlayer().getUsername() + " a gagné");
                    gameInterface.insertLi(game.getCurrentPlayer().getUsername() + " a gagné");
                    gameInterface.insertLi("Et hop, un joueur en moins, il reste" + game.getNumberOfActuelPlayers() + " joueurs");

                    game.setNumberOfActuelPlayers(game.getNumberOfActuelPlayers() - 1);
                    game.getCurrentPlayer().setStatePlaying();
                }

                // change de current player
                game.IncrementCurrentIndexPlayer();


                // delete the question from the array
                game.removeTheQuestion(getLevel, index);

                // RESET a part of the interface
                gameInterface.removeInterface();

                // RESET the game
                if (game.getNumberOfActuelPlayers() === game.getEndGameWithNumberPlayer()) {

                    if (confirm("La partie est fini, souhaitez-vous recommencez une nouvelle partie ?")) {
                        game.resetAllPoints();
                        resetQuestions();
                        game.setNumberOfActuelPlayers(game.getNumberPlayer());
                    } else {
                        gameInterface.clearAllInterface();
                    }
                }

                while (!game.getCurrentPlayer().getStatePlaying()) {
                    game.IncrementCurrentIndexPlayer();
                }

                let newButtonSearch = gameInterface.createBtnSearch();
                gameInterface.insertAfter(newButtonSearch, document.getElementById("searchbar"));

                document.getElementById("currentPlayer").innerText = game.getCurrentPlayer().getUsername();
                document.getElementById("currentPlayerScore").innerText = game.getCurrentPlayer().getPoints();

                alert("Vous pouvez conserver ou changer couleur de difficulté");




                newButtonSearch.addEventListener("click", () => {
                    play();
                })


            })
        }

    } else {
        alert("Incorrect, le niveau doit à choisir doit être l'un des niveaux suivants : vert, jaune bleu orange rouge noir");
    }
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








