(function () {
    $('#sql_engine').on('change', function () {
        console.log($(this).val());
        switch ($(this).val()) {
            case 'sqlite':
                $('#grid_mysql').hide();
                $('#grid_sqlite').show();
                break;
            case 'mysql':
                $('#grid_mysql').show();
                $('#grid_sqlite').hide();
                break;
        }
    });
    
    $('#sql_engine').trigger('change');
}());