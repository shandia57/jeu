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
        }
    }
})





function controlGoodUser(username) {
    return users.includes(username.trim().toLowerCase());
}












