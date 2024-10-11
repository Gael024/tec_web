
var nombre = document.getElementById('nom').value;
var marca = document.getElementById('marca').value;
var modelo = document.getElementById('modelo').value;
var precio = document.getElementById('precio').value;
var detalles = document.getElementById('detalles').value;
var unidades = document.getElementById('unidades').value;
var imagen = document.getElementById('imagen').value;


function validar_formulario (){


        if (nombre === "") {
        
            alert('El nombre del producto es obligatorio, por favor rellenar el campo');
            event.preventDefault();
            return;
        }
        
        if(nombre.length > 100){
        
        alert('El nombre del producto no puede ser mayor a 100 caracteres');
           event.preventDefault();
           return;
        
        }

        
            if(marca === "") {
        
                alert('Por favor seleccione una marca');
                event.preventDefault();
                return;
            }
        
        
        
            if(modelo === ""){
        
                alert('El modelo del producto es obligatorio, por favor rellenar el campo');
                event.preventDefault();
                return;
        
            }
        
            if(modelo.length > 25) {
        
                alert('El modelo del producto no puede superar los 25 caracteres');
                event.preventDefault();
                return;
            }

            
        
            if(precio === null) {
        
                alert('El producto no puede ingresarse sin un precio');
                event.preventDefault();
                return;
        
            }
        
            if(precio <100){
        
                alert('El precio minimo de un producto es de $100');
                event.preventDefault();
                return;
            }

            
        
            if(detalles > 250) {
        
                alert('Los detalles del producto no deben superar los 250 caracteres');
                event.preventDefault();
                return;
            }

            
        
            if(unidades === null) {
        
                alert('El campo "unidades" no puede quedar vacio');
                event.preventDefault();
                return;
            }
        
            if(unidades < 0){
        
                alert('El valor minimo del campo "unidades" es 0');
                event.preventDefault();
                return;
            }

            
        
            if (imagen === "") {
        
                document.getElementById('imagem').value = "img/predeterminada.jpg";
                alert('No se ha ingresado ninguna imagen, el producto se mostrará con una imagen por defecto');
                return;
            }


}
