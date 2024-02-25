$(document).ready(function () {

    $('.item-delete').click(function(e) {

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
                var url = $(this).attr('href');
                console.log(url);
                console.log(id);
                var elem  = $(this).closest('tr');


                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _method : 'delete',
                        _token  : $('meta[name="csrf-token"]').attr('content'),
                        id      : id,
                    },
                    dataType: 'json',
                    success: function(result) {

                        elem.fadeOut();

                        //

                        $('#empty').append('<div class="alert alert-danger">لا يوجد بيانات</div>');

                        Toast2.fire({
                            title: 'تم الحذف بنجاح',
                            showConfirmButton: false,
                            icon: 'success',
                            timer: 1000
                        });
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





    $('.status_category').click(function(e) {

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
            title: 'هل تغير الحاله ؟'
        }).then((result) => {
            if (result.isConfirmed) {

                var id    = $(this).data('id');
                var url = $(this).attr('action');
                console.log(url)
                var elem  = $(this).closest('tr');


                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _method : 'post',
                        _token  : $('meta[name="csrf-token"]').attr('content'),
                        id      : id,
                    },
                    dataType: 'json',
                    success: function(result) {

                        elem.fadeOut();

                        //

                        $('#empty').append('<div class="alert alert-danger">لا يوجد بيانات</div>');

                        Toast2.fire({
                            title: 'تم الحذف بنجاح',
                            showConfirmButton: false,
                            icon: 'success',
                            timer: 1000
                        });
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
