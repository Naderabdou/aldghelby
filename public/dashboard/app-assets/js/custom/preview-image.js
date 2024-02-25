$(document).ready(function() {

    // preview image 1
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                imgId = '.preview-' + $(input).attr('id');

                $(imgId).attr('src', e.target.result);


                $(imgId).show();

            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(document).on('change' , '.image' ,function() {

        readURL(this);

    });

    $(document).on('change' , '.icon' ,function() {

        readURL(this);

    });

}); // end of document
