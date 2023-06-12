n = 0;
console.log("teste");
function novadiv(){
    console.log("teste");
    n += 1;
    var novadiv = document.getElementById('novadiv');
    var button = document.getElementById('botao');
    var add = document.getElementById('adicionar');

    if(n === 1){
        novadiv.style.cssText = "display: block; position: relative; bottom: 50px;";
        button.textContent = "Cancelar";
        add.style.cssText = "opacity: 0; position: relative; z-index: -2;";
    }else if(n === 2){
        novadiv.style.cssText = "display: none;";
        button.textContent = "Adicionar Nova Divisão";
        add.style.cssText = "opacity: 1; position: relative; z-index: 1;";

        n = 0;
    }
}