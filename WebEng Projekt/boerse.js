'use strict';
let canvas;
let ctx;
let kontostand;
let preis_aktie;
let anz__aktien;
let restzeit;
let interval;

let posX;
let posY;

let button_start;
let button_kauf;
let button_verkauf_one;
let button_verkauf_all;

let anzeige_kontostand;
let anzeige_aktienKurs;
let anzeige_anzAktien;
let anzeige_restzeit;

window.addEventListener("load", init);

function init()
{
    restzeit = 300;
    kontostand = 10000.00;
    preis_aktie = 80.00;
    anz__aktien = 0;
    
    posX = 0;
    posY = 250;
    anzHintereinadnerUp = 0;
    anzHintereinadnerDown = 0;

    button_start = document.getElementById("button_game_start");
    button_kauf = document.getElementById("button_buy_one");
    button_verkauf_one = document.getElementById("button_sell_one");
    button_verkauf_all = document.getElementById("button_sell_all");

    button_start.addEventListener("click",start);
    button_kauf.addEventListener("click",kauf_aktie);
    button_verkauf_one.addEventListener("click",verkauf_aktie);
    button_verkauf_all.addEventListener("click",verkauf_aktien);

    button_kauf.disabled = true;
    button_verkauf_one.disabled = true;
    button_verkauf_all.disabled = true;

    anzeige_kontostand = document.getElementById("kontostand");
    anzeige_aktienKurs = document.getElementById("kurs_aktie");
    anzeige_anzAktien  = document.getElementById("anz_aktien");
    anzeige_restzeit   = document.getElementById("restzeit");

    anzeige_kontostand.textContent = kontostand;
    anzeige_aktienKurs.textContent = preis_aktie;
    anzeige_anzAktien.textContent = anz__aktien;
    anzeige_restzeit.textContent = restzeit;

    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
}

function start()
{
    console.log("start Boersenspiel");
    button_kauf.disabled = false;
    button_verkauf_one.disabled = false;
    button_verkauf_all.disabled = false;
    button_start.disabled = true;


    ctx.beginPath();
    ctx.moveTo(posX, posY);

    interval = setInterval(updateKurs, 1000);
}
function kauf_aktie()
{ 

    if((kontostand - preis_aktie) > 0)
    {
        anz__aktien++;
        kontostand = kontostand - preis_aktie;
        anzeige_kontostand.textContent = kontostand;
        anzeige_aktienKurs.textContent = preis_aktie;
        anzeige_anzAktien.textContent = anz__aktien;
    }
}
function verkauf_aktie()
{
    if(anz__aktien > 0)
    {
        anz__aktien--;
        kontostand = kontostand+preis_aktie;
        anzeige_kontostand.textContent = kontostand;
        anzeige_aktienKurs.textContent = preis_aktie;
        anzeige_anzAktien.textContent = anz__aktien;
    }
}
function verkauf_aktien()
{
    if(anz__aktien > 0)
    {
        kontostand = kontostand + (preis_aktie * anz__aktien);
        anz__aktien = 0;
        anzeige_kontostand.textContent = kontostand;
        anzeige_aktienKurs.textContent = preis_aktie;
        anzeige_anzAktien.textContent = anz__aktien;
    }
}
function getRandomInt(max) 
{
    return Math.floor(Math.random() * max);
}


let anzHintereinadnerUp;
let anzHintereinadnerDown;
let upOrDown;
function updateKurs()
{

        if(getRandomInt(2) == 0)
        {
            upOrDown = "up";
            anzHintereinadnerUp++;
            anzHintereinadnerDown = 0;
        }else
        {
            upOrDown = "down";
            anzHintereinadnerDown++;
            anzHintereinadnerUp = 0;
        }


    if(upOrDown == "up")
    {
        posX += 5;
        posY -= 5;
    }
    if(upOrDown == "down")
    {
        posX += 5;
        posY += 5;
    }
    console.log("POSX: " + posX + "| POSY: " + posY);
    ctx.moveTo(posX,posY);
    ctx.stroke();
}
