$(document).ready(function () {
    $('#createVideoForm').validate({ // initialize the plugin

        rules: {
            title: {
                required: true
            },
            url : {
                required: true
            },
            desc: {
                required: true
            },
        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function(form) {
            form.submit();
        }
    });

    $('#updateVideoForm').validate({ // initialize the plugin

        rules: {
            title: {
                required: true
            },
            url : {
                required: true
            },
            desc: {
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
