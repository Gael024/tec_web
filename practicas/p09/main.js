
var nombre = document.getElementById('nom').value;
var marca = document.getElementById('marca').value;
var modelo = document.getElementById('modelo').value;
var precio = document.getElementById('precio').value;
var detalles = document.getElementById('detalles').value;
var unidades = document.getElementById('unidades').value;
var imagen = document.getElementById('imagen').value;


function validar_formulario (){



    function nombre (nombre){

        if (nombre == "") {
        
            alert('El nombre del producto es obligatorio, por favor rellenar el campo');
            event.preventDefault();
        }
        
        if(nombre.length > 100){
        
        alert('El nombre del producto no puede ser mayor a 100 caracteres');
           event.preventDefault();
        
        }

        
            
        }
        
        function marca (marca){
        
            if(marca== "") {
        
                alert('Por favor seleccione una marca');
                event.preventDefault();
            }
        
        
        }
        
        function modelo (modelo) {
        
            if(modelo == ""){
        
                alert('El modelo del producto es obligatorio, por favor rellenar el campo');
                event.preventDefault();
        
            }
        
            if(modelo.length > 25) {
        
                alert('El modelo del producto no puede superar los 25 caracteres');
                event.preventDefault();
            }
        }
        
        function precio (precio){
        
            if(precio === null) {
        
                alert('El producto no puede ingresarse sin un precio');
                event.preventDefault();
        
            }
        
            if(precio <100){
        
                alert('El precio minimo de un producto es de $100');
                event.preventDefault();
            }
        
        }
        
        function detalles (detalles) {
        
            if(detalles > 250) {
        
                alert('Los detalles del producto no deben superar los 250 caracteres');
                event.preventDefault();
            }
        }
        
        function unidades (unidades) {
        
            if(unidades = null) {
        
                alert('El campo "unidades" no puede quedar vacio');
                event.preventDefault();
            }
        
            if(unidades < 0){
        
                alert('El valor minimo del campo "unidades" es 0');
                event.preventDefault();
            }
        }
        
        
        function imagen (imagen) {
        
            if (imagen = "") {
        
                document.getElementById('imagem').value = "img/predeterminada.jpg";
                alert('No se ha ingresado ninguna imagen, el producto se mostrará con una imagen por defecto');
            }
        }



}
