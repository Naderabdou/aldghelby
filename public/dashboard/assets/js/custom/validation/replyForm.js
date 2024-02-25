$('#replyForm').validate({ // initialize the plugin

    rules: {
        fullname: {
            required: true
        },
        phone: {
            required: true,
            digits: true,
            minlength: 8,
            maxlength: 14
        },
        email: {
            required: true,
            email: true
        },
        message: {
            required: true
        },
    },


    errorElement: "span",
    errorLabelContainer: '.errorTxt',

    submitHandler: function(form) {
        form.submit();
    }
});
