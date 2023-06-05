tell = document.getElementById('tell');

tell.addEventListener("keyup", function(event) {
    tell2 = tell.value;
    if(tell2.length === 1){
        tell.value = "(" + tell.value;
    }
    if(tell2.length === 3){
        tell.value = tell.value + ")";
    }
    if(tell2.lenght === 10){
        tell.value = tell.value + "-";
    }
});