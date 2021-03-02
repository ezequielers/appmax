var form = $('#frmEdit');

var validateForm = function () {
    if (form.validate().form()) {
        form.find('.form-control').css('disabled');
        $('.kt-form__actions button').attr('disabled', 'disabled');
        $('.kt-form__actions a').addClass('disabled');
        form.submit();
    }
    return false;
};

form.validate({
    rules: {
        use_name: {
            required: true,
            maxlength: 255
        },
        use_email: {
            required: true,
            email: true,
            maxlength: 255
        },
        use_password: {
            required: true,
            maxlength: 255
        }
    },
    messages: {
        use_name: {
            required: "Campo é obrigatório.",
            maxlength: "Maximo de {0} caracteres."
        },
        use_email: {
            required: "Campo é obrigatório.",
            email: 'Campo deve ser um e-mail',
            maxlength: "Maximo de {0} caracteres."
        },
        use_password: {
            required: "Campo é obrigatório.",
            maxlength: "Maximo de {0} caracteres."
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

$('#btnSubmit').click(function () {
    validateForm();
});
