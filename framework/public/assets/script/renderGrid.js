const container = document.getElementById("container");
let rows = document.getElementsByClassName("gridRow");
let cells = document.getElementsByClassName("cell");


function getPlayer(){
    let player= document.getElementById('loggedIn').getAttribute('data-value');
    let players = [];
    players.push(player);
    return players;
}

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

    let color = [];
;
    document.getElementById('listOfColors').addEventListener('change',function(){
        color.push(value);
        if(color.length===1) {
            let username = getPlayer();
            let data = [];
            username.forEach(function(elt,index){
                data.push({
                    username: elt,
                    color: color[index]
                })
            })
            let player1 = Object.keys(data).length;
            console.log(player1);
            makeRows(50);
            makeColumns(player1);
            console.log(data);
            return data;
        }
    });
}
getPlayerAndColor()


//Takes (rows, columns) input and makes a grid
function makeRows(rowNum) {
    //Creates rows
    for (let r = 0; r < rowNum; r++) {
        let row = document.createElement("div");
        container.appendChild(row).className = "gridRow";
    }
}

//check contrast ratio of color for font color in cells
function getContrast (hexcolor){

    // If a leading # is provided, remove it
    if (hexcolor.slice(0, 1) === '#') {
        hexcolor = hexcolor.slice(1);
    }
    // Convert to RGB value
    let r = parseInt(hexcolor.substr(0,2),16);
    let g = parseInt(hexcolor.substr(2,2),16);
    let b = parseInt(hexcolor.substr(4,2),16);

    // Get YIQ ratio
    let yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;

    // Check contrast
    return (yiq >= 128) ? 'black' : 'white';

}

//Creates columns
function makeColumns(cellNum) {
    let color = getColorV2();
    let contrastColor = getContrast(color);
    cellNum = getValue();

    for (let i = 0; i < rows.length; i++) {
        for (let j = 0; j < cellNum; j++) {
            let newCell = document.createElement("div");
            newCell.textContent = i.toString();
            newCell.style.textAlign = "center";
            newCell.style.lineHeight = "55px";
            newCell.style.fontWeight="600";
            newCell.style.backgroundColor=color;
            newCell.style.color = contrastColor;
            rows[j].appendChild(newCell).className = "cell";
        }
    }
}