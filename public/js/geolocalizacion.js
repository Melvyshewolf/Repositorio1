function findMe() {
    var output = document.getElementById("map");
    
    (navigator.geolocation) 
    ? output.innerHTML = `<p>Tu navegador soporta</p>` 
    : output.innerHTML = `<p>Tu navegador no soporta</p>`;  
    
    const location = (location) => {
        var latitude = location.coords.latitude;
        var longitude = location.coords.longitude;
        //var width = 1500;
       // var high = 500;

        
         output.innerHTML = `Latitud: ${latitude}, <br> Longitud: ${longitude}`;
        //var imgUrl = `https://maps.googleapis.com/maps/api/staticmap?center=${latitude},${longitude}&size=${width}x${high}&markers=color:red%7C${latitude},${longitude}&key=AIzaSyC9ogjGnUPHQKbFiAdRSdOMlu1ZPndKWY4`;

        //output.innerHTML = `<img src=${imgUrl}>` 
    }

    const error = () => {
        output.innerHTML = `<p>NO se pudo obtener tu ubicacion</p>` ;
    }

    navigator.geolocation.getCurrentPosition(location, error);
}