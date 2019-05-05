    
    $(".del").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
            url: "produse/"+id,
            type: 'POST',            
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                console.log("success");
                window.location.href = "/produse";

            }
        });

        
    });
