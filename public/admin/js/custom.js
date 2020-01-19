    
    $(".status").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "produse/stare/"+id,
            type: 'POST',            
            data: {
                "id": id,
                "_method": 'PATCH',
                "_token": token,
            },
            success: function ()
            {
                console.log("success");
                window.location.href = "/produse";

            }
        });

        
    });

    $(".statuscomanda").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "comenzi/stare/"+id,
            type: 'POST',            
            data: {
                "id": id,
                "_method": 'PATCH',
                "_token": token,
            },
            success: function ()
            {
                console.log("success");
                window.location.href = "/comenzi";

            }
        });

        
    });

    $(".delcat").click(function(){
        var idcat = $(this).data("id");
        var token = $(this).data("token");
        
        $.ajax(
        {
            url: "/categorii/"+idcat,
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
