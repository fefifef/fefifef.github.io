'use strict';

window.addEventListener("load", init);
let game = setInterval(updateSnake, 100);

document.onkeydown = function(evt) {
    evt = evt || window.event;
    switch (evt.keyCode) {
        case 37:
            richtung = 1;
            break;
        case 38:
            richtung = 2;
            break;
        case 39:
            richtung = 3;
            break;
        case 40:
            richtung = 0;
            break;
    }
};

let canvas = document.getElementById("canvas");
let snake = Object;
let field = Object;
let richtung = 0;

function init(){
    canvas.width = 500;
    canvas.height = 500;
    canvas.style.backgroundColor = "gray";
    
    snake = new Object();
    snake.x = 0;
    snake.y = 0;
    snake.size = 5;
    
    snake.segment = [];  //0 = y, 1 = x
    
    snake.segment[0] = [0, 0];
    drawCanvas();
    
}

function updateSnake(){
    
    if(snake.segment.length < snake.size){
       

        snake.segment[snake.segment.length] = [snake.segment[snake.segment.length - 1][0],
                                               snake.segment[snake.segment.length - 1][1]
                                               ];

        console.log(snake.segment[snake.segment.length - 1]);
    }
    
    for (let i = snake.segment.length - 1; i > 0 ; i--){
        snake.segment[i] = [snake.segment[i - 1][0],
                            snake.segment[i - 1][1]
                            ];
        
        console.log(snake.segment[i]);
    }
    
    snake.segment[0] = [snake.segment[0][0] + ((richtung == 0) ? 1 :
                                               (richtung == 2) ?
                                               (-1) : 0),
                        snake.segment[0][1] + ((richtung == 1) ? (-1) :
                                               (richtung == 3) ?
                                               (1) : 0
                                               )
                        ];
    
    console.log(snake.segment[0]);
    
    let loos = false;
    
    for(let i = 1; i < snake.segment.length - 1; i++){
        if (snake.segment[0][0] == snake.segment[i][0] && snake.segment[0][1] == snake.segment[i][1]) {
            loos = true;
            break;
        }
    }
    
    if(loos || (snake.segment[0][1] < 0 || snake.segment[0][1] > 100) || (snake.segment[0][0] < 0 || snake.segment[0][0] > 100)){
        
        clearInterval(game);
        
    }
    
    drawCanvas();
    console.log("----------");
}

function drawCanvas(){
    
    let ctx = canvas.getContext('2d');
    
    ctx.beginPath();
    ctx.rect(0, 0, 500, 500);
    ctx.fillStyle = "gray";
    ctx.fill();
    
    ctx.fillStyle = "black";
    for (let seg of snake.segment){
        ctx.beginPath();
        ctx.rect(seg[1] * 5, seg[0] * 5, 5, 5);
        ctx.fill();
    }
    
}
