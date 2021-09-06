"use strict";

function init()
{
    document.bestellformular.anzahl.addEventListener("input", berechnePreis);
    document.bestellformular.waehrung.addEventListener("change", berechnePreis);
    document.bestellformular.lieferung_durch.addEventListener("change",changeInfo);
    document.bestellformular.addEventListener("submit",function (e){return check(e)});
}
document.addEventListener("DOMContentLoaded", init);

function check(evt)
{
    let fehler = "";

    if(document.bestellformular.firma.value == "")
    {
        fehler += "Sie müssen eine FIRMA angeben!\n";
    }

    if(document.bestellformular.str.value == "")
    {
        fehler += "Sie müssen eine STRASSE angeben!\n";
    }

    if(document.bestellformular.plz.value.length < 4 || document.bestellformular.plz.value.length > 5)
    {
        fehler += "Sie müssen eine PLZ mit min 4 und max 5 Zeichen angeben!\n";
    }

    if(isNaN(document.bestellformular.plz.value)){
        fehler += "PLZ darf nur aus Zahlen bestehen.\n";
    }
    
    if(document.bestellformular.ort.value == ""){
        fehler += "Sie müssen einen ORT angeben!\n";
    }

    if(document.bestellformular.name.value == ""){
        fehler += "Sie müssen einen NAMEN angeben!\n";
    }

    /*
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[09]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(document.bestellformular.email.value)){
        fehler += "Dies scheint keine gültige E-Mail Adresse zu sein!\n";
    }*/

    if(document.bestellformular.abweichende_rechnungsadresse_select.value == "")
    {
        fehler += "Wählen Sie eine Rechnungsadresse!\n";
    }else
    {
        if(document.bestellformular.abweichende_rechnungsadresse_select.value == "abweichend")
        {
            if(document.bestellformular.rechnungsadresse_firma.value == ""){
                fehler += "Sie müssen eine FIRMA angeben!\n";
            }
        
            if(document.bestellformular.rechnungsadresse_str.value == ""){
                fehler += "Sie müssen eine STRASSE angeben!\n";
            }
        
            if(document.bestellformular.rechnungsadresse_plz.value.length < 4 || document.bestellformular.plz2.value.length > 5){
                fehler += "Sie müssen eine PLZ mit min 4 und max 5 Zeichen angeben!\n";
            }
        
            if(isNaN(document.bestellformular.rechnungsadresse_plz.value)){
                fehler += "PLZ darf nur aus Zahlen bestehen.\n";
            }
            
            if(document.bestellformular.rechnungsadresse_ort.value == ""){
                fehler += "Sie müssen einen ORT angeben!\n";
            }
        }
    }

    if(document.bestellformular.agb.checked == false){
        fehler += "Sie müssen die AGB's bestätigen!\n";
    }

    if(fehler != "")
    {
        alert(fehler);
        evt.preventDefault();
    }
    return;
}

function handleChange1()
{
    document.getElementById("abweichende_rechnungsadresse").style.display = "none";
}
function handleChange2()
{
    document.getElementById("abweichende_rechnungsadresse").style.display = "block";
}

function changeInfo()
{
    if(document.bestellformular.lieferung_durch.value = "DHL")
    {
        document.getElementById("paketdienst").href="DHL.de"
    }
    else
    {
        if(document.bestellformular.lieferung_durch.value = "UPS")
        {
            document.getElementById("paketdienst").href="UPS.de"
        }
        else
        {
            document.getElementById("paketdienst").href="HERMES.de"   
        }
    }
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