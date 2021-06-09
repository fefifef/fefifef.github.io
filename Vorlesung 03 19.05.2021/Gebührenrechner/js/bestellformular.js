"use strict";

function init()
{
    document.bestellformular.anzahl.addEventListener("input", berechnePreis);
    document.bestellformular.waehrung.addEventListener("change", berechnePreis);
}
document.addEventListener("DOMContentLoaded", init);

function berechnePreis()
{
    let anzahl = document.bestellformular.anzahl.value;
    let summe = anzahl * 999;

    if(document.bestellformular.waehrung.value == "CHF")
    {
        summe *= 0.5;
    }
    else
    {
        if(document.bestellformular.waehrung.value == "USD")
        {
            summe *= 2;
        }
    }
    
    document.getElementById("preis_anzeige").textContent = summe.toFixed(2);
}