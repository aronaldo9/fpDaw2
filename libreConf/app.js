const apiUrl = "C:/xampp/htdocs/fpDaw2/libreConf/precios.json";


fetch(apiUrl)
  .then(respuesta => {
    if (!respuesta.ok) {
      throw new Error(`Error al realizar la solicitud. Código de estado: ${respuesta.status}`);
    }
    return respuesta.json();
  })
  .then(datos => {
    // Extraer la información relevante de los datos
    const { date, hour, market, price, units } = datos;

    // Mostrar la información en la consola
    console.log('Fecha:', date);
    console.log('Hora:', hour);
    console.log('Mercado:', market);
    console.log('Precio:', price);
    console.log('Unidad:', units);
  })
  .catch(error => {
    console.error('Error al realizar la solicitud:', error.message);
  });
