
function Modificar() {

    function cambiar(event, id) {

        // Obtiene el ID de la fila donde está el botón presionado
        var rowId = event.target.closest('tr').id; 

        // Se obtienen los datos de la fila en forma de arreglo
        var data = document.getElementById(rowId).querySelectorAll(".row-data");
        
        var nombre = data[0].innerHTML;
        var marca = data[1].innerHTML;
        var modelo = data[2].innerHTML;
        var precio = data[3].innerHTML;
        var unidades = data[4].innerHTML;
        var detalles = data[5].innerHTML;
        var imagen = data[6].querySelector('img').src; 

        alert("Nombre: " + nombre + "\nMarca: " + marca+"\nModelo: " + modelo + "\nPrecio: " + precio+"Detalles: " + detalles + "\nUnidades: " + unidades+"\nImagen: " + imagen );
        send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen);    

}

function send2form(id, nombre, marca, modelo, precio, detalles, unidades, imagen ) {
    var form = document.createElement("form");

    // Campo oculto para el ID
    var idIn = document.createElement("input");
    idIn.type = 'hidden';
    idIn.name = 'id';
    idIn.value = id;
    form.appendChild(idIn);

    // Campo para el nombre
    var nombreIn = document.createElement("input");
    nombreIn.type = 'text';
    nombreIn.name = 'nombre';
    nombreIn.value = nombre;
    form.appendChild(nombreIn);

    // Campo para la marca
    var marcaIn = document.createElement("input");
    marcaIn.type = 'text';
    marcaIn.name = 'marca';
    marcaIn.value = marca;
    form.appendChild(marcaIn);

    // Campo para el modelo
    var modeloIn = document.createElement("input");
    modeloIn.type = 'text';
    modeloIn.name = 'modelo';
    modeloIn.value = modelo;
    form.appendChild(modeloIn);

    // Campo para el precio
    var precioIn = document.createElement("input");
    precioIn.type = 'text';
    precioIn.name = 'precio';
    precioIn.value = precio;
    form.appendChild(precioIn);

    // Campo para los detalles
    var detallesIn = document.createElement("textarea");
    detallesIn.name = 'detalles';
    detallesIn.value = detalles; // Aquí se establece el valor de detalles
    form.appendChild(detallesIn);

    // Campo para las unidades
    var unidadesIn = document.createElement("input");
    unidadesIn.type = 'text';
    unidadesIn.name = 'unidades';
    unidadesIn.value = unidades;
    form.appendChild(unidadesIn);

    // Campo para la imagen
    var imagenIn = document.createElement("input");
    imagenIn.type = 'text';
    imagenIn.name = 'imagen';
    imagenIn.value = imagen;
    form.appendChild(imagenIn);

    // Configurar el formulario para enviar los datos
    form.method = 'POST';
    form.action = 'https://localhost/tecweb/practicas/p09/formulario_productos_v2.php';

    // Agregar el formulario al cuerpo del documento y enviarlo
    document.body.appendChild(form);
    form.submit();
}