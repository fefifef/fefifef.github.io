let wahl = 0;

function onClickSonderpreis()
{
    let p = document.getElementById("preis");
    let g = document.getElementById("preisbereich");
    p.style.color = "red";
    p.style.fontSize = "16px";
  
    g.childNodes[0].style.color = "green";
}


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

//Möglichkeit 1 --> Problem Touch
function mouseOverjpg()
{
    document.getElementById("bild").setAttribute("src", "img/notstromaggregat-rueckseite.jpg");
}
function mouseoutjpg()
{
    document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
}

//Möglichkeit 2 --> Touch Problem nicht mehr
function wechsleBild()
{
    if(document.getElementById("bild").getAttribute("src") == "img/notstromaggregat.jpg")
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat-rueckseite.jpg");
    }
    else
    {
        document.getElementById("bild").setAttribute("src", "img/notstromaggregat.jpg");
    }
}