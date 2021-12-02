//Sets important constants and variables

const container = document.getElementById("container");
let rows = document.getElementsByClassName("gridRow");
let cells = document.getElementsByClassName("cell");

function getValue(){
    let numberOfUsers = document.getElementById('numberOfUsers')
    return numberOfUsers.getAttribute('value');
}

//function to test associating color to each user from index list
//replaced with dynamic choice of color in V2
function getColorV1(){
    let colors = document.getElementById('listOfColors')
    let arrayOfColors = [];
    let options = colors.options.length;
    for(let i = 0;i<options;i++){
       if(colors.options[i].value){
           arrayOfColors.push(colors.options[i].value)
       }
    }
    return arrayOfColors;
}

function getColorV2(){

    let selectedColor = document.getElementById('listOfColors');
    return selectedColor.options[selectedColor.selectedIndex].value;
}


function getPlayerAndColor(){

    let selectedColor = document.getElementById('listOfColors');
    let value = selectedColor.options[selectedColor.selectedIndex].value;

    selectedColor.insertBefore(new Option('--Select Color--', ''), document.getElementById("listOfColors").firstChild);
    selectedColor.selectedIndex = 0

    let colorSelection = [];

    document.getElementById('listOfColors').addEventListener('change',function(){
        alert(value);
        colorSelection.push(value);
        if(colorSelection.length===1) {
            let player = getPlayer();
            let playerAndColor = {};
            player.map((val, index) => {
                playerAndColor[val] = colorSelection[index]
            });
            console.log(playerAndColor);
            let player1 = Object.keys(playerAndColor).length;
            console.log(player1);
            makeRows(50);
            makeColumns(player1);
            return playerAndColor;
        }
    });
}
getPlayerAndColor()

function getPlayer(){
    let player= document.getElementById('loggedIn').getAttribute('data-value');
    let players = [];
    players.push(player);
    return players;
}


//Takes (rows, columns) input and makes a grid
function makeRows(rowNum) {
    //Creates rows
    for (let r = 0; r < rowNum; r++) {
        let row = document.createElement("div");
        container.appendChild(row).className = "gridRow";
    }
}

//Creates columns
function makeColumns(cellNum) {
    cellNum = getValue();
    let color = getColorV2();
    for (let i = 0; i < rows.length; i++) {
        for (let j = 0; j < cellNum; j++) {
            let newCell = document.createElement("div");
            newCell.textContent = i.toString();
            newCell.style.textAlign = "center";
            newCell.style.lineHeight = "55px";
            newCell.style.fontWeight="600";
            newCell.style.backgroundColor=color;
            rows[j].appendChild(newCell).className = "cell";
        }
    }
}