
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

