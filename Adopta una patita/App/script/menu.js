var lkAdopta = document.getElementById("link_adopta"); // <a> de Adopta
//alert("Hola"+document.domain);

// Evento click de <a> Inicio
  link_index.onclick = function (){
    top.postMessage('index.html', '*');
  }
  // Evento click de <a> Adopta
  lkAdopta.onclick = function (){
    top.postMessage('adopta.php', '*');
  }
  // Evento click de <a> Refugios     
  link_refugios.onclick = function (){
    top.postMessage('lista-refugios.html', '*');
  }
  // Evento click de <a> Contactanos
  link_contacta.onclick = function (){
    top.postMessage('contactanos.html', '*');
  }
  // Evento click de <button> Registrate
  btn_registro.onclick = function (){
    top.postMessage('registro.html', '*');
  }
  // Evento click de <button> Inicia Sesión   
  btn_inicio.onclick = function (){
    top.postMessage('inicio_sesion.php', '*');
  }

/*
var lkAdopta = document.getElementById("link_adopta"); // <a> de Adopta

alert("Hola" , document.domain);
  // Evento click de <a> Adopta
  lkAdopta.onclick = function (){
    top.postMessage('adopta', parent.origin);
    alert("mensaje enviado");
  }










/*
$(document).ready(function() { 
    // get the iframe in my documnet 
    var iframe = document.getElementById("frame-menu"); 
    // get the window associated with that iframe 
    var iWindow = iframe.contentWindow; 

    // wait for the window to load before accessing the content 
    iWindow.addEventListener("load", function() { 
     // get the document from the window 
     var doc = iframe.contentDocument || iframe.contentWindow.document; 

     // find the target in the iframe content 
     var target = doc.getElementById("gatot"); 
     target.innerHTML = "Found It!"; 
    }); 
}); 
*/







/*
var blob = null
var xhr = new XMLHttpRequest()
xhr.open("GET", "../menu.txt")
xhr.responseType = "blob"
xhr.onload = function() 
{
    blob = xhr.response
    LoadAndDisplayFile(blob)
}
xhr.send()
alert(blob);
/*
input.addEventListener("change", () => {
  const file = input.files.item(0);
  fileToText(file, (text) => {
    save(text, "fileName.txt", "text/plain");
  });
});

function fileToText(file, callback) {
  const reader = new FileReader();
  reader.readAsText(file);
  reader.onload = () => {
    callback(reader.result);
  };
}

function save(content, fileName, mime) {
  const blob = new Blob([content], {
    tipe: mime
  });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = fileName;
  a.click();
}*/
/*
<script src="script/menu.js"></script>
    <script>
    </script>
    
    <script>
      
      /*
      var frame = document.getElementById('frame-menu');
      function despliegue(){
          //var hm = frame.contentDocument.document.getElementById('navbar-toggler-icon');
          //var hm = frame.contentDocument? frame.contentDocument: frame.contentWindow.document;
            //var btnMenu = hm.getElementById('navbar-toggler-icon');
            var y = (frame.contentWindow || frame.contentDocument);
            if (y.document)y = y.document;
            //var icono = y.getElementById('navbar-toggler-icon');
              alert("sss");
      }
      
      var listener = window.addEventListener('blur', function() {
        if (document.activeElement == frame) {alert("ddd");
          despliegue();
        }
      });
      /*
      var hm = (frame.contentWindow || frame.contentDocument);
      if(hm.window){ hm = hm.document; alert("fffffff");}
      var ihm = hm.getElementById("navbar-toggler-icon");
      hm.body.style.backgroundColor = "red";
      alert(hm);

      /*
      focus();
      var listener = window.addEventListener('blur', function() {
          if (document.activeElement == frame) {
              if($('frame').contents('navbar-toggler-icon')){
                  alert(frame.contains(hm));
              }
              frame.style.height = '360px';
          } else {
            frame.style.height = '100px';
          }
          window.removeEventListener('blur', listener);
      });
      */
  
  