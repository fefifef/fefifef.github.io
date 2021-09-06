document.getElementById("login_web").addEventListener("click",function()
{
    const pas = document.getElementById("password_web").value;

    if(pas == "WebEngRockt")
    {
        window.open("./WebEng_1/WebEng Projekt/index.html");
    }else
    {
        alert("Falsches Password");
    }
});