let userSelector = document.querySelectorAll('.listOfUsers')

let colorSelector = document.querySelectorAll('.selectColor')
let input1 = document.getElementById('showColor1');
let input2 = document.getElementById('showColor2');
let input3 = document.getElementById('showColor3');
let input4 = document.getElementById('showColor4');
let input5 = document.getElementById('showColor5');
let input6 = document.getElementById('showColor6');
let players = [];
let divs = [input1, input2, input3, input4, input5, input6];
let count = -1

for (let i = 0; i < colorSelector.length; i++) {
    colorSelector[i].addEventListener('change', () => {
        if (colorSelector[i].value) {
            count += 1;
            if (count === 0) {
                divs[0].style.backgroundColor = colorSelector[i].value;
                divs[0].value = [userSelector[i].value,colorSelector[i].value];
            }
            if (count === 1) {
                divs[1].style.backgroundColor = colorSelector[i].value;
                divs[1].value = [userSelector[i].value,colorSelector[i].value];
            }
            if (count === 2) {
                divs[2].style.backgroundColor = colorSelector[i].value;
                divs[2].value = [userSelector[i].value,colorSelector[i].value]

            }
            if (count === 3) {
                divs[3].style.backgroundColor = colorSelector[i].value;
                divs[3].value = [userSelector[i].value,colorSelector[i].value];

            }
            if (count === 4) {
                divs[4].style.backgroundColor = colorSelector[i].value;
                divs[4].value = [userSelector[i].value,colorSelector[i].value];

            }
            if (count === 5) {
                divs[5].style.backgroundColor = colorSelector[i].value;
                divs[5].value = [userSelector[i].value,colorSelector[i].value];

            }
            players.push({
                username: userSelector[i].value,
                color: colorSelector[i].value
            })

            let allPlayers = Object.keys(players).length;
            console.log(allPlayers);
            let numberOfUsers = document.getElementById('numberOfUsers')
            numberOfUsers.value = allPlayers;
            makeGrid();
            console.log(players);
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

function deleteUsername() {
    const usernames = document.querySelector('#players');
    let selected = [];
    for (let i = 0; i < usernames.options.length; i++) {
        selected[i] = usernames.options[i].selected;

        let index = usernames.options.length;
        while (index--) {
            if (selected[index]) {
                usernames.remove(index);
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
//console.log(players);

//Creates columns
function makeGrid() {
    let table =document.getElementById('myTable')
    for (let i = 0; i < 2; i++) {
        // creates a table row
        let row = document.createElement("tr");
        let attrib = document.createAttribute('id');
        attrib.value = userSelector[i].value;
        row.setAttributeNode(attrib);
        console.log(attrib.value);

        for (let j = 0; j < 49; j++) {
            let cell = document.createElement("td");
            cell.style.border = "4px solid" + colorSelector[i].value;
            console.log(colorSelector[i].value)
            row.appendChild(cell);
            table.appendChild(row);

        }
    }
}

