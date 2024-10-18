// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

  /* --------*/
/*
  fetch('./backend/create.php', { method: 'POST', headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(producto)
})
.then(response => response.json())
.then(data => {
    if (data.status === 'success') {
        window.alert(data.message);  
    } else {
        window.alert(data.message);  
    }
})


.catch(error => {
    window.alert('Hubo un problema con la inserción: ' + error.message);
});
*/

  /*------- */

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}


function buscarProducto (e){

    e.preventDefault();
    
    var busquedaC = document.getElementById('buscar_c').value;

    /*--------- */
    
    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(productos.length > 0) {

                let template = '';
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO

                productos.forEach(function(productos) {

                    let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';


                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                } );
   

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("busquedaC="+busquedaC);

}




// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}



/*Validar Datos */


function validar_JSON (event){

    var I_producto = document.getElementById('description').value;
    var F_producto = JSON.parse(I_producto);
    F_producto['nombre'] = document.getElementById('name').value;
    
    
            if (F_producto.nombre === "") {
            
                alert('El nombre del producto es obligatorio, por favor rellenar el campo');
                event.preventDefault();
                return;
            }
            
            if(F_producto.nombre.length > 100){
            
            alert('El nombre del producto no puede ser mayor a 100 caracteres');
               event.preventDefault();
               return;
            
            }
    
            
                if(F_producto.marca === "") {
            
                    alert('Por favor seleccione una marca');
                    event.preventDefault();
                    return;
                }
            
            
            
                if(F_producto.modelo === ""){
            
                    alert('El modelo del producto es obligatorio, por favor rellenar el campo');
                    event.preventDefault();
                    return;
            
                }
            
                if(F_producto.modelo.length > 25) {
            
                    alert('El modelo del producto no puede superar los 25 caracteres');
                    event.preventDefault();
                    return;
                }
    
                
            
                if(isNaN(F_producto.precio)) {
            
                    alert('El producto no puede ingresarse sin un precio');
                    event.preventDefault();
                    return;
            
                }
            
                if(F_producto.precio <100){
            
                    alert('El precio minimo de un producto es de $100');
                    event.preventDefault();
                    return;
                }
    
                
            
                if(F_producto.detalles.length > 250) {
            
                    alert('Los detalles del producto no deben superar los 250 caracteres');
                    event.preventDefault();
                    return;
                }
    
                
            
                if(isNaN(F_producto.unidades)) {
            
                    alert('El campo "unidades" no puede quedar vacio');
                    event.preventDefault();
                    return;
                }
            
                if(F_producto.unidades < 0){
            
                    alert('El valor minimo del campo "unidades" es 0');
                    event.preventDefault();
                    return;
                }
    
                
            
                if (F_producto.imagen === "") {
            
                    document.getElementById('imagen').value = "img/predeterminada.jpg";
                    alert('No se ha ingresado ninguna imagen, el producto se mostrará con una imagen por defecto');
                    return;
                }
    
    
    }
    

