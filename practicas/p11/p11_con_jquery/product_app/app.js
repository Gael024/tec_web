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
    $('#product-result').hide();
    fetchTasks();

    $('search').keyup(function (e){

        if($('#search').val()){

            let search = $('#search').val();
            $.ajax({

                url: 'product-search.php',
                type: 'POST',
                data: { search },

                success: function (response){
                    
                    let tasks = JSON.parse(response);
                    let template = '';

                    tasks.forEach(task => {
                        template += '<li>
                        $(task.name)
                        </li>'
                    });

                    $('#container').html(template);
                    $('#product-result').show;
                }

            });
        }
    });

    $('#product-form').submit (function (e){
        const postData = {
            name: $('#name').val(),
            description: $('description').val(),
            id: $('taskId').val()
        };

        let url = edit === false ? 'product-add.php' : 'product-edit.php';


        $.post(url, postData, function (response){
            fetchTasks();

            $('#product-form').trigger('reset');
        });
        e.preventDafult();
    });



 function fetchTasks(){

    
    $.ajax ({
        url: 'product-list.php',
        type: 'GET',
        success: function (response) {
            let tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
                templeta += '
                <tr taskId="$(task.id)">
                
                       <td>$(task.id)</td>
                       <td>

                         <a href="#" class="task-item">$(task.name)</a>

                       </td>
                       <td>$(task.description)</td>
                       <td>
                              <button class="task-delete btn btn-danger">Eliminar</button>

                       </td>
                
                </tr>
            '
            });
            $('#products').html(template);
        }
    })

 }


 $(document).on('click', '.task-delete', function(){
  
    if(confirm('El elememto será eliminado ¿Está seguro de querer realizar esta acción? ')) {

       
    let element = $(this)[0].parentElement.parentElement;
    let id =  $(element).attr('taskId');
    $.post('product-delete.php', {id}, function (response){
        fetchTasks();
    })

    } 

    
 });


 $(document).on('click', '.task-item', function(){
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('taskId');
    $.post('product-single.php', {id}, function(response){
        const task = JSON.parse(response);
        $('#name').val(task.name);
        $('#description').val(task.description);
        $('#taskId').val(task.id);
        edit = true;
    })
 });
    

});