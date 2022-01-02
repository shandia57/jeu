const container = document.getElementById("container");
let rows = document.getElementsByClassName("gridRow");
let cells = document.getElementsByClassName("cell");

let userSelector = document.querySelectorAll('.listOfUsers')
let label1 = document.getElementById('player1');
let label2 = document.getElementById('player2');
let label3 = document.getElementById('player3');
let label4 = document.getElementById('player4');
let label5 = document.getElementById('player5');
let label6 = document.getElementById('player6');

let players = [label1, label2, label3, label4, label5, label6];


let colorSelector = document.querySelectorAll('.selectColor')
let input1 = document.getElementById('showColor1');
let input2 = document.getElementById('showColor2');
let input3 = document.getElementById('showColor3');
let input4 = document.getElementById('showColor4');
let input5 = document.getElementById('showColor5');
let input6 = document.getElementById('showColor6');

let divs = [input1, input2, input3, input4, input5, input6];
let count = -1
let readyToPlay = [];
for (let i = 0; i < colorSelector.length; i++) {
    colorSelector[i].addEventListener('change', () => {
        if (colorSelector[i].value) {
            count += 1;
            if (count === 0) {
                divs[0].style.backgroundColor = colorSelector[i].value;
                divs[0].value = userSelector[i].value;
            }
            if (count === 1) {
                divs[1].style.backgroundColor = colorSelector[i].value;
                divs[1].value = userSelector[i].value;
            }
            if (count === 2) {
                divs[2].style.backgroundColor = colorSelector[i].value;
                divs[2].value = userSelector[i].value;

            }
            if (count === 3) {
                divs[3].style.backgroundColor = colorSelector[i].value;
                divs[3].value = userSelector[i].value;

            }
            if (count === 4) {
                divs[4].style.backgroundColor = colorSelector[i].value;
                divs[4].value = userSelector[i].value;

            }
            if (count === 5) {
                divs[5].style.backgroundColor = colorSelector[i].value;
                divs[5].value = userSelector[i].value;

            }
            readyToPlay.push({
                username: userSelector[i].value,
                color: colorSelector[i].value
            })

            let allPlayers = Object.keys(readyToPlay).length;
            let numberOfUsers = document.getElementById('numberOfUsers')
            numberOfUsers.value = allPlayers;
            makeRows(50);
            makeColumns(1);
            console.log(readyToPlay);

            return readyToPlay;
        }

    });
}

//delete color after selection on click
function deleteColor() {
    const colors = document.querySelector('#colorList');
    let selected = [];
    for (let i = 0; i < colors.options.length; i++) {
        selected[i] = colors.options[i].selected;

        let index = colors.options.length;
        while (index--) {
            if (selected[index]) {
                colors.remove(index);
            }
        }
    }
}


//create an array from color list
function getColorV1(){
    let colors = document.getElementById('selectColor')
    let arrayOfColors = [];
    let options = colors.options.length;
    for(let i = 0;i<options;i++){
        if(colors.options[i].value){
            arrayOfColors.push(colors.options[i].value)
        }
    }
    return arrayOfColors;
}


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
    let i =0;
    let color = colorSelector[i].value;
    console.log(color);
    let contrastColor = getContrast(color);

    for (let i = 0; i < rows.length; i++) {
        for (let j = 0; j < cellNum; j++) {
            if(i <= 49) {
                let newCell = document.createElement("div");
                newCell.textContent = i.toString();
                newCell.style.textAlign = "center";
                newCell.style.lineHeight = "55px";
                newCell.style.fontWeight = "600";
                newCell.style.backgroundColor = color;
                newCell.style.color = contrastColor;
                rows[j].appendChild(newCell).className = "cell";
            }else{
                return false;
            }
        }
    }
}