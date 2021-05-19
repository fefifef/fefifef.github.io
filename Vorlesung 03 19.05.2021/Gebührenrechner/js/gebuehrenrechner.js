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

    for(let i = i; i < anzTeilnehmer; i++)
    {
        nachnamen[i] = prompt("Name des " + (i+1) + ". Teilnehmers?","");
    }
    for(let n of nachnamen)
    {
        console.log(n);
    }
}