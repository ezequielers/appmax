var form = $('#frmLogin');

var validateForm = function () {
    if (form.validate().form()) {
        form.submit();
    }
    return false;
};

form.validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        }
    },
    messages: {
        email: {
            required: "Usuário é obrigatório.",
            email: 'Campo deve ser um e-mail'
        },
        password: {
            required: "Senha é obrigatória"
        }
    },
    submitHandler: function (form) {
        form.submit();
    }
});

$('#frmLogin .form-control').keypress(function (e) {
    if (e.which == 13) {
        validateForm();
    }
});

$('#btnSubmit').click(function () {
    validateForm();
});
