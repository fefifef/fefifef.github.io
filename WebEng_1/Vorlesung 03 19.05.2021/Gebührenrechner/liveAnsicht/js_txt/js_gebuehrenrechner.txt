function berechnePreis(netto)
{
    let anzTeilnehmer = prompt("Bitte gebe die Anzahl der Teilehmer ein");
    let brutto = 0;
    for(let i = 1; i <= anzTeilnehmer; i++)
    {
        if(i <= 2)
        {
            brutto = brutto + netto * 1.19;
        }
        else
        {
            if(i <= 4)
            {
                brutto = brutto + (netto * 1.19 * 0.7);
            }
            else
            {
                if(i <= 7)
                {
                    brutto = brutto + (netto * 1.19 * 0.5);
                }
                else
                {
                    brutto = brutto + (netto * 1.19 * 0.4);
                }
            }
        }
    }
    alert("Die Schulung kostet inkl. MwSt. (für " + anzTeilnehmer + " Personen) "+ brutto.toFixed(2) + " Euro");
    
    let nachnamen = [];

    for(let k = 0; k < anzTeilnehmer; k++)
    {
        nachnamen[k] = prompt("Name des " + (k+1) + ". Teilnehmers?","");
    }
    for(let n of nachnamen)
    {
        console.log(n);
    }

    adresseEinlesen();
    bestellungsbestaetigung();
}

function bestellungsbestaetigung()
{
    let date = new Date();
    let today = date.getDate() + "." + (date.getMonth()+1) + "."+ date.getFullYear();

    let newDate = new Date();

    newDate.setDate(date.getDate()+3);

    let newday = newDate.getDate() + "." + (newDate.getMonth()+1) + "."+ newDate.getFullYear();

    alert("Vielen dank für ihre Bestellung am heutigen " + today + ". Die Buchungsbestädigung erhalten Sie spätestens in drei Tagen, d.h. am " + newday);
}

function adresseEinlesen()
{
    Rechnungsadresse.firmenname = prompt("Firmenname");
    Rechnungsadresse.str = prompt("Straße");
    Rechnungsadresse.plz = prompt("PLZ");
    Rechnungsadresse.ort = prompt("Ort");

    Rechnungsadresse.showDetails();
}


let Rechnungsadresse = 
{
    firmenname: "",
    str: "",
    plz: 0,
    ort: "",
    showDetails: function()
    {
        console.log("Firmenname: " + this.firmenname);
        console.log("Straße: " + this.str);
        console.log("plz: " + this.plz + "| ort: " + this.ort);
    }
}
