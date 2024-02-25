$(document).ready(function () {

    $('.deleteImage').click(function(e) {

        e.preventDefault();
        const Toast2 = Swal.mixin({

            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

        const Toast = Swal.mixin({

            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: '#888',
            confirmButtonColor: '#d6210f',
            confirmButtonText: 'حذف',
            cancelButtonText: 'لا',
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'question',
            title: 'هل تريد الحذف ؟'
          }).then((result) => {
                if (result.isConfirmed) {
                    var id    = $(this).data('id');
                    var url = $(this).data('url');
                    var elem  = $(this).closest('img');

                    $.ajax({
                        type: 'get',
                        url: url,
                        data: {
                            _method : 'delete',
                            _token  : $('meta[name="csrf-token"]').attr('content'),
                            id      : id,
                        },
                        dataType: 'json',
                        success: function(result) {
                            elem.fadeOut();

                            Toast2.fire({
                                title: 'تم الحذف بنجاح',
                                // showConfirmButton: false,
                                icon: 'success',
                                timer: 1000
                            });

                            setTimeout(function(){ location.reload(); }, 1000);

                        } // end of success

                    }); // end of ajax

                } else if (result.dismiss === Swal.DismissReason.cancel)
                {
                    Toast2.fire({
                        title: 'تم إلإلغاء',
                        // showConfirmButton: false,
                        icon: 'success',
                        timer: 1000
                    });

                } // end of else confirmed

            }) // end of then
    });

});

