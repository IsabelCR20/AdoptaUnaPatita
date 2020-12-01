var tarjetasPerfil = document.getElementsByClassName("tarjeta-perfil");

for (let i = 0; i < tarjetasPerfil.length; i++) {
    const tarjeta = tarjetasPerfil[i];
    tarjeta.onclick = function (){
        //document.location.replace('perfilMascota.html');
        var idTarjeta = tarjeta.id;
        var idRegistro = idTarjeta.substring(7);
        var idForm = '#frmIDM' + idRegistro;
        //alert('ID del form:  ' + idForm);
        $(idForm).submit();
    }
}
