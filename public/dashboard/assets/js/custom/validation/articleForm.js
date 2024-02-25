$(".article_or_research").click(function () {

    var value = $(this).val();

    if (value == 'article') {
        $('#showTitle').show();
        $('#showDesc').show();
        $('#showImage').show();
        $('#showPublishDate').show();
        $('#showKeywords').show();
        $('#showFile').hide();
        $('#showPages').hide();
        $('#showFolders').hide();
    } else {
        $('#showTitle').show();
        $('#showDesc').show();
        $('#showImage').show();
        $('#showPublishDate').show();
        $('#showFile').show();
        $('#showPages').show();
        $('#showFolders').show();
        $('#showKeywords').show();
    }

});

$(document).ready(function () {

    $.validator.addMethod('greaterThanDate', function (value) {
        // get date today and compare with the date entered
        var today = new Date();
        var date = new Date(value);
        return date <= today;

    }, 'يجب ان يكون تاريخ النشر أصغر من او مساوى لتاريخ اليوم');

    $('#createArticleForm').validate({ // initialize the plugin

        rules: {
            type: {
                required: true
            },
            title: {
                required: true
            },
            publish_date: {
                required: true,
                greaterThanDate: true
            },
            image: {
                required: true
            },
            file: {
                required: '#research[value="research"]:checked'
            },
            pages: {
                required: '#research[value="research"]:checked'
            },
            folders: {
                required: '#research[value="research"]:checked'
            },
            // desc: {
            //     required: true
            // },
        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function(form) {
            form.submit();
        }
    });

    $('#updateArticleForm').validate({ // initialize the plugin

        rules: {
            type: {
                required: true
            },
            title: {
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
            //     required: '#research[value="research"]:checked'
            // },
            pages: {
                required: '#research[value="research"]:checked'
            },
            folders: {
                required: '#research[value="research"]:checked'
            },
            // desc: {
            //     required: true
            // },
        },


        errorElement: "span",
        errorLabelContainer: '.errorTxt',

        submitHandler: function(form) {
            form.submit();
        }
    });
});

