$(document).ready(function () {
    $('.comment-form').on('submit', function () {
        var no_error = true;
        var msg = '';
        var operation = $('.operation').text().split(' ');
        if (operation[1] == '+') {
            var result = parseInt(operation[0]) + parseInt(operation[2]);
        } else {
            var result = parseInt(operation[0]) * parseInt(operation[2]);
        }
        if ($('#name') == '' || $('#email') == '' || $('#comment') == '') {
            msg = 'Nincs kitöltve minden mező!';
            no_error = false;
        }
        if (result != $('#captcha').val()) {
            msg = 'Hibás ellenőrző kód!';
            no_error = false;
        }
        $('#error_msg').html('<div class="alert alert-danger alert-dismissible" role="warning"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + msg + '</div>');
        return no_error;
    });
});
