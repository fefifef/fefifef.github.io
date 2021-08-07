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

let anzHintereinadnerUp;
let anzHintereinadnerDown;

window.addEventListener("load", init);

function init()
{
    restzeit = 300;
    kontostand = 10000.00;
    preis_aktie = 100.00;
    anz__aktien = 0;
    
    posX = 0;
    posY = 500;
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
        anzeige_kontostand.textContent = kontostand.toFixed(2);
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
        anzeige_kontostand.textContent = kontostand.toFixed(2);
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
        anzeige_kontostand.textContent = kontostand.toFixed(2);
        anzeige_aktienKurs.textContent = preis_aktie;
        anzeige_anzAktien.textContent = anz__aktien;
    }
}
function getRandomInt(max) 
{
    return Math.floor(Math.random() * max);
}




function updateKurs()
{    
    /*
    upOrDown == 0 --> Up
    upOrDown == 1 --> Stay
    upOrDown == 2 --> Down
    */
    let upOrDown;
    let veraenderung = getRandomInt(9)+1;

    //------------------------- 5 Minuten lang -------------------------
    if(restzeit == 0)
    {
        clearInterval(interval);
        endMessage()
        return;
    }
    restzeit--;
    anzeige_restzeit.textContent = restzeit;
    //------------------------- 5 Minuten lang -------------------------
    
    //------------------------- Preis und Bewegung berechnen -------------------------
    if(anzHintereinadnerDown == 3)
    {
        upOrDown = getRandomInt(5);
        switch(upOrDown)
        {
            case 0,1,2: //Sinkt
                    preis_aktie -= veraenderung / 10;
                    posY += veraenderung;
                break;
            case 3: //Bleibt gleich
                anzHintereinadnerUp = 0;
                anzHintereinadnerDown = 0;
                break;
            case 4: //Steigt
                anzHintereinadnerUp = 0;
                anzHintereinadnerDown = 0;
                preis_aktie += veraenderung/10;
                posY -= veraenderung;
                break;    
        }
    }else
    {
        if(anzHintereinadnerUp == 3)
        {
            upOrDown = getRandomInt(5);
            switch(upOrDown)
            {
                case 0,1,2: //Steigt
                        preis_aktie += veraenderung / 10;
                        posY -= veraenderung;
                    break;
                case 3: //Bleibt gleich
                    anzHintereinadnerUp = 0;
                    anzHintereinadnerDown = 0;
                    break;
                case 4: //Sinkt
                    anzHintereinadnerUp = 0;
                    anzHintereinadnerDown = 0;
                    preis_aktie -= veraenderung / 10;
                    posY += veraenderung;
                    break;    
            }
        }
        else
        {
            upOrDown = getRandomInt(3);
            switch(upOrDown)
            {
                case 0: //Steigt
                    anzHintereinadnerUp++;
                    anzHintereinadnerDown = 0;
                    preis_aktie += veraenderung / 10;
                    posY -= veraenderung;
                    break;
                case 1: //Bleibt gleich
                    anzHintereinadnerUp = 0;
                    anzHintereinadnerDown = 0;
                    break;
                case 2: //Sinkt
                    anzHintereinadnerUp = 0;
                    anzHintereinadnerDown++;
                    preis_aktie -= veraenderung / 10;
                    posY += veraenderung;
                    break;
            }
        }
    }
    posX += 5;

    if(posX == 1000)
    {
        ctx.beginPath();

        posX = 0;
        ctx.moveTo(posX,posY);

        ctx.beginPath();
        ctx.rect(0, 0, 1000, 1000);
        ctx.fillStyle = "#aaaaaa";
        ctx.fill();
        ctx.beginPath();
    }
    else
    {
        anzeige_aktienKurs.textContent = preis_aktie.toFixed(2);
        console.log("POSX: " + posX + "| POSY: " + posY);
        ctx.lineTo(posX,posY);
        ctx.stroke();
    }
    //-------------------------  -------------------------  
}

function endMessage()
{
    console.log("End Message wird geöffnet");
    let message = "Dein EndKontostand beträgt: " + kontostand.toFixed(2) + " <br/>";

    if(kontostand >= 10000.00)
    {
        message = message + "Damit hast du " + (kontostand - 10000).toFixed(2) + " Gewinn gemacht. <br/>";
    }
    else
    {
        message = message + "Damit hast du " + -(kontostand - 10000).toFixed(2) + "verlust gemacht. <br/>";
    }

    if(anz__aktien > 0)
    {
        message = message + "Du hast aber noch " + anz__aktien.toFixed(2) + " Aktien im Wert von " + preis_aktie.toFixed(2) + " Euro";
    }
    document.getElementById("body_text").innerHTML = message;
    console.log("Message: ");
    console.log(message);
    $("#modalEnde").modal("show");
}