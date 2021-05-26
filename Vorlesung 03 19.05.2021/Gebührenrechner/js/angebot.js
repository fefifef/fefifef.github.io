function onClickSonderpreis()
{
    let p = document.getElementById("preis");

    p.style.color = "red";
    p.style.fontSize = "16px";

    let g = document.getElementById("preisbereich");

    g.childNodes[0].style.color = "green";
}