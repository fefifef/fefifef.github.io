"use strict";

function init()
{
    document.formular.addEventListener("submit",function (e){return check(e)});
}
document.addEventListener("DOMContentLoaded", init);

function check(evt)
{
    let fehler = "";
    //--------------------> Anrede überprüfen <--------------------
    if(document.formular.gender.value == "")
    {
        fehler += "Bitte Geben sie ihre Anrede noch an \n";
    }

    //--------------------> Vorname überprüfen <--------------------
    if(document.formular.vorname.value == "")
    {
        fehler += "Bitte Geben sie den Vorname ein \n";
    }
    //--------------------> Nachname überprüfen <--------------------
    if(document.formular.nachname.value == "")
    {
        fehler += "Bitte Geben sie den Nachname ein \n";
    }
    //--------------------> E-Mail überprüfen <--------------------
    if(document.formular.mail_1.value != document.formular.mail_2.value)
    {
        fehler += "Ihre E-Mail Adressen stimmen nicht über ein \n";
    }
    //--------------------> Geburtsdatum überprüfen <--------------------
    let geburtstag = document.formular.geburtsdatum.value;
    let today = new Date();
    let geb = new Date(geburtstag.substring(0,4),geburtstag.substring(5,7),geburtstag.substring(8,10));

    //Jahr Überprüfen 
    if((today.getFullYear() - geb.getFullYear()) >= 19)
    {
        console.log("Mindesten 18 Jahre Alt | Durch Jahre");
    }
    else
    {
        if((today.getFullYear() - geb.getFullYear()) <= 17)
        {
            console.log("Keine 18 Jahre Alt | Durch Jahr");
            fehler += "Sie sind noch nicht 18 Jahre Alt \n";
        }
        else
        {
            //Monat Überprüfen
            if((today.getMonth()+1) > geb.getMonth())
            {
                console.log("Mindestens 18 Jahre Alt | Durch Monate");
            }
            else
            {
                if((today.getMonth()+1) == geb.getMonth())
                {
                    if(today.getDate() >= geb.getDate())
                    {
                        console.log("Mindesten 18 Jahre Alt | Durch Tag");
                    }
                    else
                    {
                        console.log("Keine 18 Jahre Alt | Durch Tag");
                        fehler += "Sie sind noch nicht 18 Jahre Alt \n";
                    }
                }
                else
                {
                    console.log("Keine 18 Jahre Alt | Durch Monate");
                    fehler += "Sie sind noch nicht 18 Jahre Alt \n";
                }
                
            }
        }
        
    }


    //--------------------> PLZ überprüfen <--------------------
    if(document.formular.plz.value.length < 4 || document.formular.plz.value.length > 5){
        fehler += "Sie müssen eine PLZ mit min 4 und max 5 Zeichen angeben!\n";
    }

    //--------------------> Schauen ob es Fehler gibt <--------------------
    if(fehler != "")
    {
        alert(fehler);
        evt.preventDefault();
    }
    return;
}
