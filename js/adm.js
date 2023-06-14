function video(){
    var tela_btn = document.getElementById('botoes');
    var tela_video = document.getElementById('tela_video');
    var cancelar = document.getElementById('btn_cancelar');

    tela_btn.style.display = "none";
    tela_video.style.display = "flex";
    cancelar.style.display = "block";

}

function cancel(){
    var tela_btn = document.getElementById('botoes');
    var tela_video = document.getElementById('tela_video');
    var cancelar = document.getElementById('btn_cancelar');
    var tela_banco = document.getElementById('tela_banco');

    tela_btn.style.display = "block";
    tela_video.style.display = "none";
    cancelar.style.display = "none";
    tela_banco.style.display = "none";
}

function banco(){
    var tela_btn = document.getElementById('botoes');
    var tela_banco = document.getElementById('tela_banco');
    var cancelar = document.getElementById('btn_cancelar');

    tela_btn.style.display = "none";
    tela_banco.style.display = "flex";
    cancelar.style.display = "block";
}