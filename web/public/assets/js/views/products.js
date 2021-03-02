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
        pro_sku: {
            required: true,
            maxlength: 255
        },
        pro_name: {
            required: true,
            maxlength: 255
        },
        pro_price: {
            required: true,
            maxlength: 255
        },
        pro_amount: {
            required: true,
            maxlength: 255
        }
    },
    messages: {
        pro_sku: {
            required: "Campo é obrigatório.",
            maxlength: "Maximo de {0} caracteres."
        },
        pro_name: {
            required: "Campo é obrigatório.",
            maxlength: "Maximo de {0} caracteres."
        },
        pro_price: {
            required: "Campo é obrigatório.",
            maxlength: "Maximo de {0} caracteres."
        },
        pro_amount: {
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

$('input[name="pro_price"]').maskMoney({
    'prefix': 'R$ ',
    'thousands': '.',
    'decimal': ','
});

$('#btnSavePrint').click(function () {
    $('#pr').val('1');
    form.submit();
})
