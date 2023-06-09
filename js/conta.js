var olho = document.getElementById('ver');
var input = document.getElementById('senha');
var n = 0;

function verr(){
    n += 1;
    if(n === 1){
        input.type = "text";
    }else{
        n = 0;
        input.type = "password";
    }
}