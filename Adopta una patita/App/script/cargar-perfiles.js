var tarjetasPerfil = document.getElementsByClassName("tarjeta-perfil");

for (let i = 0; i < tarjetasPerfil.length; i++) {
    const tarjeta = tarjetasPerfil[i];
    tarjeta.onclick = function (){
        document.location.replace('perfilMascota.html');
    }
}
/*
tarjetasPerfil.forEach(tarjeta => {
    tarjeta.onclick = function (){
        document.location.replace('../formularioAdopcion.html');
    }
});
*/