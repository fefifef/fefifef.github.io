'use strict';
let kontostand;
let preis_aktie;
let anz__aktien;
let restzeit;

let canvas;
let ctx;

let posX;
let posY;

let interval;
let interval_zeit;

let button_start;
let button_kauf;
let button_verkauf_one;
let button_verkauf_all;

let signUp;
let signDown;

let anzeige_kontostand;
let anzeige_aktienKurs;
let anzeige_anzAktien;
let anzeige_restzeit;

let anzHintereinanderUp;
let anzHintereinanderDown;



window.addEventListener("load", init);

function init()
{
    restzeit = 300;
    kontostand = 10000.00;
    preis_aktie = 100.00;
    anz__aktien = 0;
    
    posX = 0;
    posY = 500;
    anzHintereinanderUp = 0;
    anzHintereinanderDown = 0;

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

    signUp = document.getElementById("upPicture");
    signDown = document.getElementById("downPicture")

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
    interval = setInterval(updateKurs, 100);
    interval_zeit = setInterval(updateTime, 1000);
}
function kauf_aktie()
{ 

    if((kontostand - preis_aktie) > 0)
    {
        console.log("Aktie für " + preis_aktie + " gekauft.");
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
        console.log("Aktie für " + preis_aktie + " verkauft.");
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
        console.log( anz__aktien + " Aktien für insgesamt " + (preis_aktie * anz__aktien) + " verkauft.");
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
function ende()
{
    console.log("Ende");
    clearInterval(interval);
    clearInterval(interval_zeit);
    endMessage()
}
function updateTime()
{
    restzeit--;
    anzeige_restzeit.textContent = restzeit;
}
function setVisible(object)
{
    object.classList.remove("display_none");
    object.classList.add("display_true");
}
function setNotVisible(object)
{
    object.classList.add("display_none");
    object.classList.remove("display_true");
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

function updateKurs()
{    
    let upOrDown;
    let veraenderung = getRandomInt(9)+1;

    //------------------------- 5 Minuten lang ------------------------- 
    
    
    if(restzeit == 0)
    {
        ende();
        return;
    }

    //------------------------- 5 Minuten lang -------------------------
    
    //------------------------- Preis und Bewegung berechnen -------------------------
    if(anzHintereinanderDown < 3 && anzHintereinanderUp < 3)
    {
        upOrDown = getRandomInt(3);
        console.warn("Standart: " + upOrDown);
        switch(upOrDown)
            {
                case 0: //Steigt
                        console.log("Steigt mit 33,3% Wahrscheinlichkeit");

                        anzHintereinanderUp++;
                        anzHintereinanderDown = 0;

                        preis_aktie += veraenderung / 10;
                        posY -= veraenderung;
                    break;
                case 1: //Bleibt gleich
                        console.log("Bleibt gleich mit 33,3% Wahrscheinlichkeit");

                        anzHintereinanderUp = 0;
                        anzHintereinanderDown = 0;
                    break;
                case 2: //Sinkt
                        console.log("Sinkt mit 33,3% Wahrscheinlichkeit");

                        anzHintereinanderUp = 0;
                        anzHintereinanderDown++;

                        preis_aktie -= veraenderung / 10;
                        posY += veraenderung;
                    break;
            }    

            setNotVisible(signDown);
            setNotVisible(signUp);
    }

    
    if(anzHintereinanderDown >= 3)
    {
        upOrDown = getRandomInt(5);
        console.warn("Down x 3: " + upOrDown);
        switch(upOrDown)
        {
            case 0: //Sinkt
            case 1:
            case 2:
                    setVisible(signDown);

                    preis_aktie -= veraenderung / 10;
                    posY += veraenderung;

                    console.log("Sinkt mit 60% Wahrscheinlichkeit");
                break;
            case 3: //Bleibt gleich
                    setNotVisible(signDown);

                    anzHintereinanderUp = 0;
                    anzHintereinanderDown = 0;

                    console.log("Bleibt gleich mit 20% Wahrscheinlichkeit");
                break;
            case 4: //Steigt
                    setNotVisible(signDown);

                    anzHintereinanderUp = 0;
                    anzHintereinanderUp++;
                    anzHintereinanderDown = 0;

                    preis_aktie += veraenderung/10;
                    posY -= veraenderung;
                    console.log("Steigt mit 20% Wahrscheinlichkeit");
                break;    
        }
    }
    if(anzHintereinanderUp >= 3)
        {
            upOrDown = getRandomInt(5);
            console.warn("Up x 3: " + upOrDown);
            switch(upOrDown)
            {
                case 0: //Steigt
                case 1:
                case 2:
                        setVisible(signUp);

                        preis_aktie += veraenderung / 10;
                        posY -= veraenderung;
                        
                        console.log("Steigt mit 60% Wahrscheinlichkeit");
                    break;
                case 3: //Bleibt gleich
                        setNotVisible(signUp);

                        anzHintereinanderUp = 0;
                        anzHintereinanderDown = 0;

                        console.log("Bleibt gleich mit 20% Wahrscheinlichkeit");
                    break;
                case 4: //Sinkt
                        setNotVisible(signUp);

                        anzHintereinanderUp = 0;
                        anzHintereinanderDown = 0;
                        anzHintereinanderDown++;

                        preis_aktie -= veraenderung / 10;
                        posY += veraenderung;

                        console.log("Sinkt mit 20% Wahrscheinlichkeit");
                    break;    
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
        ctx.lineTo(posX,posY);
        ctx.stroke();
    }
    anzeige_aktienKurs.textContent = preis_aktie.toFixed(2);
    console.log("POSX: " + posX + "| POSY: " + posY);
    //-------------------------  -------------------------  
}

