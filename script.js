$(document).ready( () => {
    
    $('div.alert').removeClass('alert-success');

    $('#select').change( () => {
        var formData = $( "form" ).serialize();

        $('div.alert').removeClass('alert-success');
        $('div.alert').html('');
        $('ul.list').html('');

        $.ajax({
            type: "POST",
            url: 'stock.php',
            data: formData,
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                jsonData.forEach(element => {
                    $('ul.list').append(
                        '<li class="list-group-item d-flex justify-content-between align-items-center">' + element.Descripcion +                        
                        '<span class="badge badge-primary badge-pill">' + element.StockActual +' </span> </li>'
                     );   
                });
            },
            error: () => {
                console.log("error")
            }
       });

       $.ajax({
           type: "POST",
           url: 'addStock.php',
           data: formData,
           success: function(response)
           {
                $('div.alert').addClass('alert-success');
                $('div.alert').append('<p class="text-center alert">'+ response +'</p>');
           },
           error: () => {
                console.log("error")
           }
       })
    });
    
});