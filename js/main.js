const sendEmail = (name, email, info) => {
    $.ajax({
        url: '/server/sendEmail.php',
        data: {
            'name': name,
            'email': email,
            'info': info
        },
        method: 'POST'
    });
}

const clearInput = () => {
    $('#name').val('');
    $('#email').val('');
    $('#info').val('');
}

$(() => {
    $('#submit-form').click(() => {
        let name = $('#name').val();
        let email = $('#email').val();
        let info = $('#info').val();

        if (name && email && info) {
            sendEmail(name, email, info);
            $('#form-success').modal('show');
            clearInput();
        }
    });
});