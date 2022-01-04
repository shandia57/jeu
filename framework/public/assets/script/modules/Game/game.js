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
                socket.emit("players", [player.getUsername(), player.getId()]);
                gameInterface.deleteUsernameInput();
                gameInterface.createNavBarOfPlayers();
            }
            else document.getElementById("usernameHelp").innerText = "Mauvais username";
        }
    })
} catch (err) {
    console.log(err)
}

function controlGoodUser(username) {
    return users.includes(username.trim().toLowerCase());
}












