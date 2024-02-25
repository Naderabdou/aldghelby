$(document).ready(function () {
    $('#profileForm').validate({ // initialize the plugin

        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },

        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function(form) {
            form.submit();
        }
    });
});
