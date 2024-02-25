

$(document).ready(function () {
    $.validator.addMethod('greaterThanDate', function (value) {
        // get date today and compare with the date entered
        var today = new Date();
        var date = new Date(value);
        return date <= today;

    }, 'يجب ان يكون تاريخ النشر أصغر من او مساوى لتاريخ اليوم');


    $('#createBookForm').validate({ // initialize the plugin

        lang : 'en',

        rules: {
            title_ar: {
                required: true
            },
            title_en: {
                required: true
            },
            publish_date: {
                required: true,
                greaterThanDate: true
            },
            image: {
                required: true
            },
            icon: {
                required: true
            },

            file: {
                required: true
            },
            pages: {
                required: true
            },
            folders: {
                required: true
            },
            desc_ar: {
                required: true
            },
            desc_en: {
                required: true
            },
            name_ar: {
                required: true
            },
            name_en: {
                required: true
            },
            project_id: {
                required: true
            }

        },










        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#updateBookForm').validate({ // initialize the plugin

        rules: {
            title_ar: {
                required: true
            },
            title_en: {
                required: true
            },
            name_ar: {
                required: true
            },
            name_en: {
                required: true
            },



            publish_date: {
                required: true,
                greaterThanDate: true
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
            folders: {
                required: true
            },
            desc_ar: {
                required: true
            },
            desc_en: {
                required: true
            },
            services_ar: {
                required: true
            },
            services_en: {
                required: true
            },
        },




        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function (form) {
            form.submit();
        }
    });
});
