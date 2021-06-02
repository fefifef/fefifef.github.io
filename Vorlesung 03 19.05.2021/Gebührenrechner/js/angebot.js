function onClickSonderpreis()
{
    let p = document.getElementById("preis");
    let g = document.getElementById("preisbereich");
    p.style.color = "red";
    p.style.fontSize = "16px";
  
    g.childNodes[0].style.color = "green";
}

let wahl = 0;
function wertAnzeigen()
{
    let preis = document.getElementById("preis");
    let txt = document.getElementById("preisbereich").childNodes[3];
    let button = document.getElementById("preisbereich").childNodes[4];

    //Andere Möglichkeit <=> if(button.textContent = "zeige Nettopreis") ...[Das gleiche nur ohne wahl]
    if(wahl == 0)
    {
        preis.innerHTML = "<i>"+(preis.textContent / 1.19).toFixed(2)+"</i>";
        preis.style.color = "grey";
        txt.textContent = " Euro zzgl. 19% MwSt. ";
        button.textContent = "zeige Bruttopreis";
        wahl = 1;
    }
    else
    {
        preis.innerHTML = ""+(preis.textContent * 1.19).toFixed(2);
        preis.style.color = "black";
        txt.textContent = " Euro inkl. 19% MwSt. ";
        button.textContent = "zeige Nettopreis";
        wahl = 0;
    }
}



function mouseOverjpg()
{
    document.getElementById("bild").setAttribute("src", "img/notstromaggregat-rueckseite.jpg");
}
function mouseoutjpg()
{
    document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
}

function init()
{
    console.log("DOM geladen!");
    //-->Möglichkeit 1 --> Problem Touch <-- <--
    //document.getElementById("bild").addEventListener("mouseover", mouseOverjpg());
    //document.getElementById("bild").addEventListener("mouseout", mouseoutjpg());
    //-->Möglichkeit 2<--
    //document.getElementById("bild").addEventListener("click", wechsleBild);
    //document.getElementById("bild").addEventListener("mouseover", wechsleBild);
    //document.getElementById("bild").addEventListener("mouseout", wechsleBild);

    //nextVersion
    document.getElementById("bild").addEventListener("click", function(e) {wechsleBild(e)});
    document.getElementById("bild").addEventListener("mouseover", function(e) {wechsleBild(e)});
    document.getElementById("bild").addEventListener("mouseout", function(e) 
    {
        console.log(e);
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
    });
    
    setTimeout(function()
    {
        console.log("Ladet message");
        let fenster = document.getElementById("message1");
        fenster.style.visibility = "visible";

        console.log("Window inner Height: " + window.innerHeight);
        console.log("Window inner Width: " + window.innerWidth);
        fenster.style.top = (window.innerHeight - 80) / 2 + "px";
        fenster.style.left = (window.innerWidth - 380) / 2 + "px";
        document.addEventListener('click', (event) => 
        {
            console.log(`Mouse X: ${event.clientX}, Mouse Y: ${event.clientY}`);
            if(event.clientX > ((window.innerWidth - 380) / 2 + 340) && event.clientX < (window.innerWidth / 2 + 380))
            {
                if(event.clientY > ((window.innerHeight - 80) / 2) && event.clientY < (window.innerHeight / 2 + 40))
                {
                    console.log("Close");
                    document.getElementById("message1").style.visibility = "hidden";
                }
            }
        });
    }, 10000);
}
document.addEventListener("DOMContentLoaded", init);
/*function wechsleBild()
{
    if(document.getElementById("bild").getAttribute("src") == "img/notstromaggregat.jpg")
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat-rueckseite.jpg");
    }
    else
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
    }
}*/
function wechsleBild(e)
{
    console.log(e);
    if(document.getElementById("bild").getAttribute("src") == "img/notstromaggregat.jpg")
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat-rueckseite.jpg");
        kreisausblenden();
    }
    else
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
    }
}
let gedrueckt = 0;
function zeigeKreis(id_Lupe)
{
    let red_kreis = document.getElementById("kreis");
    console.log("Gedrückt wurde: " + id_Lupe);
    
    if(document.getElementById("bild").getAttribute("src") == "img/notstromaggregat.jpg" && gedrueckt == 0)
    {
        if(id_Lupe == "lupe")
        {
            red_kreis.style.top = "90px";
            red_kreis.style.left = "390px";
            red_kreis.style.visibility = "visible";
        }
        else
        {
            if(id_Lupe == "lupe2")
            {
                red_kreis.style.top = "90px";
                red_kreis.style.left = "300px";
                red_kreis.style.visibility = "visible";
            }
            else
            {
                red_kreis.style.top = "150px";
                red_kreis.style.left = "200px";
                red_kreis.style.visibility = "visible";
            }
        }
        document.getElementById(id_Lupe).style.opacity = 0.3;
        gedrueckt = 1;
        
        return;
    }
    if(document.getElementById("bild").getAttribute("src") == "img/notstromaggregat.jpg" && gedrueckt == 1)
    {
        kreisausblenden();
        return;
    }
}
let kreisX;
let kreisY;
let intervallId
function animationAnzeige()
{
    let kreis = document.getElementById("kreis");
    kreis.style.visibility = "visible";
    kreisX = 390;
    kreisY = 90;

    intervallId = window.setInterval(bewegeKreis,30);
}

function bewegeKreis()
{
    let kreis = document.getElementById("kreis");

    if(kreisX == 390 && kreisY == 90)
    {
        document.getElementById("zweiSteckdosen").style.color = "red";
        kreis.style.opacity = 0.8;
    }
    else
    {
        if(kreisX == 300 && kreisY == 90)
        {
            document.getElementById("zweiSteckdosen").style.color = "black";
            document.getElementById("Ein-Ausschalter").style.color = "red";
            kreis.style.opacity = 0.8;
        }
        else
        {
            if(kreisX == 200 && kreisY == 150)
            {
                document.getElementById("Ein-Ausschalter").style.color = "black";
                document.getElementById("dieselmotor").style.color = "red";
                kreis.style.opacity = 0.8;
            }
            else
            {
                kreis.style.opacity = 0.5;
            }

            
        }   
    }

    kreisX--;
    if(kreisX < 300 && kreisY < 150)
    {
        kreisY++;
    }

    kreis.style.left = kreisX + "px";
    kreis.style.top = kreisY + "px";
    
    if(kreisX >= 150)
    {
        window.setTimeout("bewegeKreis",30);
    }

    if(kreisX < 199)
    {
        window.clearInterval(intervallId);
    }
    
}

function kreisausblenden()
{
    document.getElementById("kreis").style.visibility = "hidden";
    document.getElementById("lupe").style.opacity = 1.0;
    document.getElementById("lupe2").style.opacity = 1.0;
    document.getElementById("lupe3").style.opacity = 1.0;
    gedrueckt = 0;
}