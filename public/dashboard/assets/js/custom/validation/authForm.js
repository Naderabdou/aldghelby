$(document).ready(function () {
    $('#createBookForm').validate({ // initialize the plugin

        rules: {
            title: {
                required: true
            },
            publish_date: {
                required: true
            },
            image: {
                required: true
            },
            file: {
                required: true
            },
            pages: {
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

    $('#updateBookForm').validate({ // initialize the plugin

        rules: {
            title: {
                required: true
            },
            publish_date: {
                required: true
            },
            // image: {
            //     required: true
            // },
            // file: {
            //     required: true
            // },
            pages: {
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
