sair = document.getElementById("dentro");
n = 0;

if(sair.style.display == "block"){
    n += 1;
}
if(n == 1){
    function mudar(){
        sair.style.animation = "sair 0.5s";
    }
    setTimeout(mudar, 500);
    sair.style.display = "none";
}