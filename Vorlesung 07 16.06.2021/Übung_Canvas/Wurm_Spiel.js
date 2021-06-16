let canvas = document.getElementById("wurm_spiel");
canvas = canvas.getContext('2d');
let intervalID;
let posX = 200;
let posY = 200;
let direction = 2;


function init()
{
    canvas.lineJoin = "round";
    canvas.beginPath();
    canvas.moveTo(posX,posY);
    canvas.moveTo(posX,posY += 10);
    canvas.stroke();
}
document.addEventListener("DOMContentLoaded", init);

function start_game()
{
    console.log("Start Game");
    intervalID = setInterval(move, 300);
}


/*
--> Direction <--
    --> 1 == oben
    --> 2 == unten
    --> 3 == rechts
    --> 4 == links
*/
function move()
{
    console.log("POS_X: " + posX + "| POS_Y: " + posY);
    switch(direction)
    {
        case 1:
            canvas.lineTo(posX, posY -= 10);
            break;
        case 2:
            canvas.lineTo(posX, posY += 10);
            break;
        case 3:
            canvas.lineTo(posX += 10, posY);
            break;
        case 4:
            canvas.lineTo(posX -= 10, posY);
            break;
    }
    canvas.stroke();


    if(posX >= 400 || posX <= 0 || posY >= 400 || posY <= 0)
    {
        window.clearInterval(intervalID);
        alert("GAME OVER");
    }
}