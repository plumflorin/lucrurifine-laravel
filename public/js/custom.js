
    $('#sortByselect').on('change', function () {
        var value = $(this).val(); // get selected value
        //if (value) { // require a URL
            window.location = "/shop/" + value; // redirect
        //}
        //return false;
    });

