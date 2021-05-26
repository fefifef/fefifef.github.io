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

    Rechnungsadresse.showDetails();

}

let Rechnungsadresse = 
{
    firmenname: "Fa. Mustermann",
    str: "Musterstr. 36",
    plz: 12345,
    ort: "Musterort",
    showDetails: function()
    {
        console.log("Firmenname: " + this.firmenname);
        console.log("Straße: " + this.str);
        console.log("plz: " + this.plz + "| ort: " + this.ort);
    }
}