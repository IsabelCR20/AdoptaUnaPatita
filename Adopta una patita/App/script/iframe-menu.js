var iframeMenu = document.getElementById("frame-menu");
//alert("hi");

if(document.addEventListener){
    //alert("soporto");
    window.addEventListener('message', function(event) {
        var dir = event.data;// + '.html'; 
        //alert(dir);
        //alert("Esta es la di: " + dir);
        document.location.replace(dir);
    }, false );
} else {
	alert("Tu navegador no soporta mi metodo de envío, perdón :c");
}






/*
function recibir (event){
    alert("quiubo");
}
document.addEventListener('click', function(event) {
    alert('got a message');   
}, false );
*/
/*
var iframeMenu = document.getElementById("frame-menu");
// Cuando el iframe tiene el foco
alert("hi");


document.addEventListener("message", function(event){
  alert("click!!");
}, false);
/*
function recibir (event){
    alert("quiubo");
}
document.addEventListener('click', function(event) {
    alert('got a message');   
}, false );
*/