"use strict";

function init()
{
    document.bestellformular.anzahl.addEventListener("input", berechnePreis);
    document.bestellformular.waehrung.addEventListener("change", berechnePreis);
    document.bestellformular.submit.addEventListener("submit",function(evt){return check(evt)});
}
document.addEventListener("DOMContentLoaded", init);

function check(evt)
{
    let fehler = "";
    if(document.bestellformular.str.value == "")
    {
        fehler += "Sie müssen eine Straße eingeben! \n";
    }
    if(document.bestellformular.plz.value.length < 4 || document.bestellformular.plz.value.length > 5)
    {
        fehler += "Die PLZ muss aus 4 oder 5 zeichen bestehen!\n";
    }
    if(isNaN(document.bestellformular.plz.value))
    {
        fehler += "Die PLZ darf nur aus straßen bestehen";
    }

    if(fehler != "")
    {
        alert(fehler);
        evt.preventDefault();
    }
    return;
}

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