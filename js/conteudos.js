var n = 0;
function mudar(){
    n += 1;
    var tela = document.getElementById('tela_1');
    var tela_add = document.getElementById('tela_add');
    var mudar = document.getElementById('mud');
    var texto = mudar.innerHTML;

    if(n === 1){

        tela.style.cssText = 'display: none;';
        mudar.innerHTML = "Cancelar";
        tela_add.style.cssText = 'display: block;';
    }else if(n ===2){
        tela.style.cssText = 'display: block;';
        mudar.innerHTML = texto;
        tela_add.style.cssText = 'display: none;';
        
        n = 0;
    }
}