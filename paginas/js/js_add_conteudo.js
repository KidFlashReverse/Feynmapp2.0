n = 0;
console.log("teste");
function novadiv(){
    console.log("teste");
    n += 1;
    var novadiv = document.getElementById('novadiv');
    var button = document.getElementById('botao');

    if(n === 1){
        novadiv.style.cssText = "display: block";
        button.value = "Cancelar";
    }else if(n === 2){
        novadiv.style.cssText = "display: none";
        button.value = "Adicionar Nova Divisão";

        n = 0;
    }
}