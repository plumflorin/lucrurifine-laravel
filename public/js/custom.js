
    $('#sortByselect').on('change', function () {
        var value = $(this).val(); // get selected value
        //if (value) { // require a URL
            window.location = "/shop/" + value; // redirect
        //}
        //return false;
    });



    $('#sortByCatselect').on('change', function () {
        var value = $(this).val(); // get selected value
        var cat = $('input#categ').val();
        //if (value) { // require a URL
            window.location = "/shop/categorie/" + cat + "/" + value; // redirect
        //}
        //return false;
    });


    $(".delfromcart").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var idcart = $(this).data("id");
        var token = $(this).data("token");
        
        $.ajax(
        {
            url: "/cart/"+idcart,
            type: 'POST',            
            data: {                
                "_method": 'DELETE',
                "_token": token
            },
            success: function ()
            {
                window.location.reload();
            },

            error: function (data) {
                console.log('Error:', data);
                }

            
        });

        
    });

