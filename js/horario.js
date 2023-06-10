var tela_dica = document.getElementById('tela_dica');
var article = document.getElementById('article');

function dica(){
    article.style.cssText = "filter: blur(10px);";
    tela_dica.style.cssText = "display: block;";
}
function voltar(){
    article.style.cssText = "filter: blur(0px);";
    tela_dica.style.cssText = "display: none;";
}