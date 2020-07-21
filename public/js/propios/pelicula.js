function GuardarPeli(){
    var data = new FormData(document.getElementById('crearPeli'));
    fetch('pelicula',{
        method : 'POST',
        body: data
    }).then(function(d){
        console.log(d);
    });
}