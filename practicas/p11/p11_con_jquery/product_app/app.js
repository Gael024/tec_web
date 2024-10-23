// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}




$(document).ready(function(){
    let edit = false;
    console.log('Jquery is working');
    $('#product-result').hide();
    mostrarlista();

    //Busquedad de Producto
    $('#search').keyup(function(e){
        if($('#search').val()){
            
            let search = $('#search').val();
            console.log(search);
            $.ajax({
                url: 'backend/product-search.php', 
                type: 'POST',
                data: { search },
                success: function(response){
                    let productos = JSON.parse(response);
                    let template = '';
                    productos.forEach(producto => {
                        template += `
                        <li> ${producto.nombre}</li>
                        `;
                        console.log(producto.nombre);
                    });
                    $('#container').html(template);
                    $('#product-result').removeClass('d-none');
                }
            });
        }
    })

    //Agregar Producto
    $('#product-form').submit(function(e){
        //Validar datos
        var nombre = $('#name').val();
        var descripcion = $('#description').val();
        var F_producto = JSON.parse(descripcion);

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


        //Enviar datos
        const postData ={
            name: $('#name').val(),
            description: $('#description').val(),
            producto_id: $('#producto_id').val()
        };

        let Url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        console.log(Url);

        $.post(Url,postData, function(response){
            $('#container').html(response);
            $('#product-result').removeClass('d-none');
            mostrarlista();
            $('#product-form').trigger('reset');
            init();
        })
        e.preventDefault();
    })

    //Mostrar lista
    function mostrarlista(){
        $.ajax({
            url:'backend/product-list.php',
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);
                let template = '';
                productos.forEach(producto => {
                    template += `
                        <tr productoID="${producto.id}">
                            <td>${producto.id}</td>
                            <td>
                                <a href="#" class="product-item">${producto.nombre}</a>
                            </td>
                            <td>
                                <ul>
                                    <li>precio: ${producto.precio}</li>
                                    <li>unidades: ${producto.unidades}</li>
                                    <li>modelo: ${producto.modelo}</li>
                                    <li>marca: ${producto.marca}</li>
                                    <li>detalles: ${producto.detalles}</li>
                                </ul>
                            </td>
                            <td>
                                <button class="product-delete btn btn-danger"">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#products').html(template);
                $('#product-result').show();
            }
        })
    }

    //Eliminar producto
    $(document).on('click', '.product-delete', function(){
        if(confirm("De verdad deseas eliminar el Producto")){
            let element = $(this)[0].parentElement.parentElement;
            let id= $(element).attr('productoID');
            $.post('backend/product-delete.php', {id}, function(response){
                $('#container').html(response);
                $('#product-result').removeClass('d-none');
                mostrarlista(); 
            })
        }
    });

    //Iteraccion con el usuario
    $(document).on('click', '.product-item', function() {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productoID');
        $.post('backend/product-single.php', { id }, function(response) {
            const producto = JSON.parse(response);
            $('#producto_id').val(producto.id);
            $('#name').val(producto.nombre);
            delete producto.id;
            delete producto.nombre;
            $('#description').val(JSON.stringify(producto, null, 2));
            edit = true;
        });
    });

});