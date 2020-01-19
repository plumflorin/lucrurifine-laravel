
    $('#sortByselect').on('change', function () {
        var value = $(this).val(); // get selected value
        //if (value) { // require a URL
            window.location = "/shop/" + value; // redirect
        //}
        //return false;
    });



    $('#sortByCatselect').on('change', function () {
        var value = $(this).val(); // get selected value
        // var cat = $('input.categ').val();

        var url = window.location.pathname.split("/");
        var cat = url[3];

        console.log(cat);
        window.location = "/shop/categorie/" + cat + "/sortare/" + value; // redirect
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

        

        

    //     $("body").on("click", "#plaseazacomanda", function() {
    //         var datacomanda = {
    //             _token: $('#_token').val(),
    //             nume: $('#nume').val(),
    //             prenume: $('#prenume').val(),
    //             adresa: $('#adresa').val(),
    //             localitate: $('#localitate').val(),
    //             judet: $('#judet').val(),
    //             telefon: $('#telefon').val(),
    //             email: $('#email').val(),
    //         };
    //         $.ajax(
    //         {
    //             url: "/final-comanda",
    //             type: 'post',            
    //             data: datacomanda,
    //             // success: function ()
    //             // {
    //             //     window.location.reload();
    //             // },
    
    //             error: function (data) {
    //                 console.log('Error:', data);
    //                 }
                
    //         });

        
    // });

