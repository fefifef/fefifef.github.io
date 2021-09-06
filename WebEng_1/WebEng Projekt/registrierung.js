function init()
{
    document.formular.addEventListener("submit",function (e){return check(e)});
}
document.addEventListener("DOMContentLoaded", init);

function border_setback()
{
    document.getElementById("auswahl_gender").style.border = "none";
    document.getElementById("vorname").style.borderColor = "#FFFFFF";
    document.getElementById("nachname").style.borderColor = "#FFFFFF";
    document.getElementById("mail_1").style.borderColor = "#FFFFFF";
    document.getElementById("mail_2").style.borderColor = "#FFFFFF";
    document.getElementById("geburtsdatum").style.borderColor = "#FFFFFF";
    document.getElementById("plz").style.borderColor = "#FFFFFF";
}

function check(evt)
{
    let fehler = "";
    //--------------------> Border zuruecksetzen <--------------------
    border_setback();
    
    //--------------------> Anrede überprüfen <--------------------
    if(document.formular.gender.value == "")
    {
        fehler += "Bitte Geben sie ihre Anrede noch ein. \n";
        document.getElementById("auswahl_gender").style.border = "1px solid #fe0000";
    }

    //--------------------> Vorname überprüfen <--------------------
    if(document.formular.vorname.value == "")
    {
        fehler += "Bitte Geben sie den Vorname ein. \n";
        document.getElementById("vorname").style.borderColor = "#fe0000";
    }
    //--------------------> Nachname überprüfen <--------------------
    if(document.formular.nachname.value == "")
    {
        fehler += "Bitte Geben sie den Nachname ein. \n";
        document.getElementById("nachname").style.borderColor = "#fe0000";
    }
    //--------------------> E-Mail überprüfen <--------------------
    if(document.formular.mail_1.value == "")
    {
        fehler += "Sie haben keine Mail Adresse eingegeben. \n";
        document.getElementById("mail_1").style.borderColor = "#fe0000";
    }
    if(document.formular.mail_2.value == "")
    {
        fehler += "Sie haben ihre Mail Adresse nicht bestätigt. \n";
        document.getElementById("mail_2").style.borderColor = "#fe0000";
    }

    //--------------------> E-Mail gleichheit überprüfen <--------------------
    if(document.formular.mail_1.value != document.formular.mail_2.value)
    {
        fehler += "Ihre E-Mail Adressen stimmen nicht über ein \n";
        document.getElementById("mail_1").style.borderColor = "#fe0000";
        document.getElementById("mail_2").style.borderColor = "#fe0000";
    }
    //--------------------> Geburtsdatum überprüfen <--------------------
    let geburtstag = document.formular.geburtsdatum.value;
    let today = new Date();
    let geb = new Date(geburtstag.substring(0,4),geburtstag.substring(5,7),geburtstag.substring(8,10));

    if(geburtstag == "")
    {
        fehler += "Sie haben kein Datum eingegeben \n";
        console.log("Keine Geburtsdatum eingegeben");
        document.getElementById("geburtsdatum").style.borderColor = "#fe0000";
    }
    else
    {
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
                document.getElementById("geburtsdatum").style.border = "1px solid #fe0000";
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
    }
    

    //--------------------> PLZ überprüfen <--------------------
    if(document.formular.plz.value.length < 4 || document.formular.plz.value.length > 5){
        fehler += "Sie müssen eine PLZ mit min 4 und max 5 Zeichen angeben!\n";
        document.getElementById("plz").style.borderColor = "#fe0000";
    }

    //--------------------> Schauen ob es Fehler gibt <--------------------
    if(fehler != "")
    {
        console.log("Fehler Entdeckt:");
        console.log(fehler);
        document.getElementById("fehler_text").innerText = fehler;
        $("#modalFehler").modal("show");
        evt.preventDefault();
    }
    else
    {
        window.open("./erfRegistrierung.html","_blank");
    }
    return;
}
