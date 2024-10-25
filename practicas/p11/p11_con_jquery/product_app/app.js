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
    //listarProductos();
}

$(document).ready(function(){

    let edit = false;
    console.log('La consulta esta trabajando');
    //$('#product-result').hide();
    fetchTasks();

    $('#search').keyup(function(e){
       /*e.preventDafult(); */ 

        if($('#search').val()){

            let search = $('#search').val();
            $.ajax({

                url: 'backend/product-search.php',
                type: 'POST',
                data: { search },

                success: function (response){
                    
                    let tasks = JSON.parse(response);
                    let template = '';

                    tasks.forEach(task => {
                        template += `<li>
                        ${task.nombre}
                        </li>` 
                    });

                    $('#container').html(template);
                    //$('#product-result').show();
                    $('#product-result').removeClass('d-none');

                    /* */
                }

            });
        }
    });

    $('#product-form').submit (function (e){
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };

        let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
        console.log(url);


        $.post(url, postData, function (response){
            $('#container').html(response);
            $('#product-result').removeClass('d-none');
            fetchTasks();
            $('#product-form').trigger('reset');
            init();
        });
        e.preventDafult();
    });



 function fetchTasks(){

    
    $.ajax ({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function (response) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                template += `
                        <tr taskID="${task.id}">
                            <td>${task.id}</td>
                            <td>
                                <a href="#" class="task-item">${task.nombre}</a>
                            </td>
                            <td>
                                <ul>
                                    <li>precio: ${task.precio}</li>
                                    <li>unidades: ${task.unidades}</li>
                                    <li>modelo: ${task.modelo}</li>
                                    <li>marca: ${task.marca}</li>
                                    <li>detalles: ${task.detalles}</li>
                                </ul>
                            </td>
                            <td>
                                <button class="task-delete btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
            `
            });
            $('#products').html(template);
        }
    })

 }


 $(document).on('click', '.task-delete', function(){
  
    if(confirm('El elememto será eliminado ¿Está seguro de querer realizar esta acción? ')) {

       
    let element = $(this)[0].parentElement.parentElement;
    let id =  $(element).attr('taskId');
    $.post('backend/product-delete.php', {id}, function (response){
        $('#container').html(response);
        fetchTasks();
    })

    } 

    
 });


 $(document).on('click', '.task-item', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('taskId');
    $.post('backend/product-single.php', {id}, function(response){
        const task = JSON.parse(response);
        $('#taskId').val(task.id);
        $('#name').val(task.nombre);
        delete task.id;
        delete task.nombre;
        $('#description').val(JSON.stringify(task, null, 2));
       
        edit = true;
    })
 });
    

});