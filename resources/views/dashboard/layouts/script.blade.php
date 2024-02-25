<!-- BEGIN: Vendor JS-->
<script src="{{ asset('dashboard/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('dashboard/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('dashboard/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->

<script src="{{ asset('dashboard/app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
<script src="{{ asset('dashboard/app-assets/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('dashboard/js/index.js') }}"></script>
<script src="{{ asset('dashboard/js/roles.js') }}"></script>
<script src="{{ asset('dashboard/js/noty/noty.min.js') }}"></script>

<!-- END: Page JS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>

<script>
    $('.table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"
        }
    });

    CKEDITOR.replace('description_ar', {
        language: 'ar'
    });
    CKEDITOR.replace('description_en', {
        language: 'ar'
    });
</script>


@stack('js')

@if (session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "{{ session()->get('error') }}"
        })
    </script>
@endif

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<script>
    $(function () {

        $('.image').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });

    });//end of document ready
    $('.all_delete').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty(
            {
                text: "هل أنت متأكد من الحذف؟",
                type: "warning",
                @if(app()->getLocale() == 'ar')
                layout:'topLeft',
                @else
                layout:'topRight',
                @endif
                timeout: 3000,
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-success mr-1', function () {

                        that.closest('form').submit();

                    }),

                    Noty.button("لا", 'btn btn-primary mr-1', function () {

                        n.close();

                    })
                ]
            }
        );

        n.show();

    });//end of delete

    $('.all_status').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty(
            {
                text: "هل أنت متأكد من تغيير الحالة؟",
                type: "success",
                @if(app()->getLocale() == 'ar')
                layout:'topLeft',
                @else
                layout:'topRight',
                @endif
                timeout: 3000,
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-success mr-1', function () {

                        that.closest('form').submit();

                    }),

                    Noty.button("لا", 'btn btn-primary mr-1', function () {

                        n.close();

                    })
                ]
            }
        );

        n.show();

    });//end of delete
</script>
