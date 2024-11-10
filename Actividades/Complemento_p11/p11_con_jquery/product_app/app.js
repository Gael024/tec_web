// JSON BASE A MOSTRAR EN FORMULARIO


var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };
  
  

$(document).ready(function(){
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });


    $('#product-form').submit(function(e){
        var nombre = $('#nombre').val();
        var modelo = $('#modelo').val();
        var precio = parseFloat($('#precio').val());
        var detalles = $('#detalles').val();
        var unidades = parseInt($('#unidades').val());
        var imagen = $('#imagen').val();

        if (nombre === '' || modelo === '' || isNaN(precio) || precio <= 0 || detalles === '' || isNaN(unidades) || unidades <= 0) {
            alert('Rellenar los campos obligatorios');
            e.preventDefault();
            return;
        }

        const postData ={
            nombre: $('#nombre').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            precio: $('#precio').val(),
            detalles: $('#detalles').val(),
            unidades: $('#unidades').val(),
            imagen: imagen,
            producto_id: $('#producto_id').val()
        };

        let Url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        console.log(Url);
        console.log(postData);

        $.post(Url,postData, function(response){
            $('#container').html(response);
            $('#product-result').removeClass('d-none');
            mostrarlista();
            $('#product-form').trigger('reset');
        })
        e.preventDefault();
    })

    /*
    $('#product-form').submit(e => {
        e.preventDefault();

        // SE CONVIERTE EL JSON DE STRING A OBJETO
        let postData = {
            nombre: $('#nombre').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            precio: $('#precio').val(),
            detalles: $('#detalles').val(),
            unidades: $('#unidades').val(),
            imagen: $('#imagen').val(),
            id: $('#productId').val() 
        };

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            //console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
            // SE REINICIA EL FORMULARIO
            $('#name').val('');
            $('#description').val(JsonString);
            // SE HACE VISIBLE LA BARRA DE ESTADO
            $('#product-result').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
    });
*/

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response);
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#name').val(product.nombre);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            // SE ELIMINA nombre, eliminado E id PARA PODER MOSTRAR EL JSON EN EL <textarea>
            delete(product.nombre);
            delete(product.eliminado);
            delete(product.id);
            // SE CONVIERTE EL OBJETO JSON EN STRING
            let JsonString = JSON.stringify(product,null,2);
            // SE MUESTRA STRING EN EL <textarea>
            $('#description').val(JsonString);
            
            // SE PONE LA BANDERA DE EDICIÓN EN true
            edit = true;
        });
        e.preventDefault();
    });    
});

/*------------ */
$('#nombre').on('input blur', function() {
    const nombre = $(this).val();
    const statusBar = $('#nombreStatus'); 
    $('#nombre').next('small').remove();
    if (nombre === '') {
        $('#nombre').after('<small style="color: white;">Campo obligatorio</small>');
        statusBar.addClass('red'); 
    } else if(nombre.length >= 100){
        $('#nombre').after('<small style="color: white;">El nombre no puede superar los 100 caracteres</small>');
        statusBar.addClass('yellow'); 
    }else {
        statusBar.addClass('green');
        console.log("Estado: green");
    }
});
/*
$('#marca').on('input blur', function() {
    const marca = $(this).val();
    const statusBar = $('#marcaStatus'); 
    statusBar.removeClass('d-none red green yellow');
    $('#marca').next('small').remove();
    if(marca === 'Marca del producto'){
        statusBar.addClass('red'); 
        $('#marca').after('<small style="color: white;">...</small>');
    }else{
        statusBar.addClass('green');
    }
});
*/
$('#modelo').on('input blur', function() {
    const modelo = $(this).val();
    const statusBar = $('#modeloStatus'); 
    $('#modelo').next('small').remove();
    if (modelo === '') {
        statusBar.addClass('red'); 
        $('#modelo').after('<small style="color: white;">Campo obligatorio</small>');
    }else if(modelo.length >= 25){
        $('#modelo').after('<small style="color: white;">El modelo no puede superar los 25 caracteres</small>');
        statusBar.addClass('yellow'); 
    } 
    else if(modelo.length < 25){
        $('#modelo').after('<small style="color: white;">Campo validado</small>');
        statusBar.addClass('yellow'); 
    }else {
        statusBar.addClass('green');
    }
});
$('#precio').on('input blur', function(){
    const precio = parseFloat($(this).val());
    const statusBar = $('#precioStatus'); 
    $('#precio').next('small').remove();
    if(isNaN(precio)){
        statusBar.addClass('red'); 
        $('#precio').after('<small style="color: white;">¡Campo obligatorio</small>');
    }else if (precio <= 99.99) {
        statusBar.addClass('yellow'); 
        $('#precio').after('<small style="color: white;">El precio no puede ser menor a 100</small>');
    }
    else if (precio > 99.99) {
        statusBar.addClass('yellow'); 
        $('#precio').after('<small style="color: white;">Campo validado</small>');
    }else{
        statusBar.addClass('green');
    }
});
$('#detalles').on('input blur', function(){
    const detalles = $(this).val();
    const statusBar = $('#detallesStatus'); 
    $('#detalles').next('small').remove();
    if(detalles === ''){
        statusBar.addClass('red'); 
        $('#detalles').after('<small style="color: white;">Campo obligatorio</small>');
    }else if(detalles.length >=250){
        statusBar.addClass('yellow'); 
        $('#detalles').after('<small style="color: white;">No puede ingresar más de 250 caracteres>');
    }
    else if(detalles.length < 250){
        statusBar.addClass('yellow'); 
        $('#detalles').after('<small style="color: white;">Campo validado>');
    }else{
        statusBar.addClass('green');
    }
});
$('#unidades').on('input blur', function(){
    const unidades = parseInt($(this).val());
    const statusBar = $('#unidadesStatus'); 
    $('#unidades').next('small').remove();
    if(isNaN(unidades)){
        statusBar.addClass('red'); 
        $('#unidades').after('<small style="color: white;">Campo obligatorio</small>');
    }else if (unidades >= 0) {
        statusBar.addClass('yellow'); 
        $('#unidades').after('<small style="color: white;">Campo validado</small>');
    }
    else if (unidades < 0) {
        statusBar.addClass('yellow'); 
        $('#unidades').after('<small style="color: white;">No se acpetan valores negativos</small>');
    }else{
        statusBar.addClass('green');
    }
});
$('#imagen').on('input blur', function(){
    const imagen = $(this).val();
    const statusBar = $('#imagenStatus'); 
    $('#imagen').next('small').remove();
    if(imagen === ''){
        statusBar.addClass('red'); 
        $('#imagen').after('<small style="color: white;">Campo obligatorio</small>');
    }else{
        statusBar.addClass('green');
    }
});

$('#nombre').on('input', function () {
    let nombre = $(this).val();
    if (nombre.length > 0) {
        $.ajax({
            url: 'backend/ValidarNombre.php',
            type: 'POST',
            data: { nombre: nombre },
            success: function (response) {
                const statusBar = $('#nombreStatus'); 
                statusBar.removeClass('d-none red green yellow');
                if (response === 'existe') {
                    $('#nombre').next('small').remove();
                    $('#nombre').after('<small style="color: white;">El nombre ya existe en la DB.</small>');
                    statusBar.addClass('red');
                } else {
                    $('#nombre').next('small').remove();
                    $('#nombre').after('<small style="color: white;">Nombre disponible.</small>');
                    statusBar.addClass('green');
                }
            }
        });
    } else {
        $('#nombre').next('small').remove();
    }
});

