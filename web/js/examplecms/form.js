require(['jquery'], function($) {
    $('[role=alert]').hide();

    $('form').on({
        change: function () {
            $('[role=alert]').hide();
        },
        submit: function(event) {
            var form = $(this);
            event.preventDefault();
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serializeArray(),
                //processData: false,
                //contentType: false,
                dataType: 'json',
                success: function(data) {
                    if (data.result) {
                        window.location.href = data.location;
                    } else {
                        $('[role=alert]').html(data.errors.join('<br/>'));
                        $('[role=alert]').show();
                    }
                }
            });
        }
    });
})