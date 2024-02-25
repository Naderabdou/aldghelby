@extends('dashboard.layouts.app')

@section('title', 'رسائل التواصل')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb ml-1">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسيه</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">رسائل
                                            التواصل</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">العرض</li>
                                </ol>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم الاول</th>
                                            <th>الاسم الاخير</th>

                                            <th>رقم الجوال</th>
                                            <th>البريد الإلكترونى</th>
                                            <th>الرساله</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact->first_name }}</td>
                                                <td>{{ $contact->last_name }}</td>

                                                <td>
                                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                                </td>
                                                <td>
                                                    <a href="mailTo:{{ $contact->email }}">{{ $contact->email }}</a>
                                                </td>
                                                <td>{{ strip_tags(\Str::limit($contact->message, 100, '...')) }}

                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a data-id="{{ $contact->id }}"
                                                            class="btn btn-sm btn-danger item-delete"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('js')
        <script>
            $(document).ready(function() {

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

                            var id = $(this).data('id');
                            var url = '{{ route('admin.contacts.deleteMsg', ':id') }}';
                            url = url.replace(':id', id);

                            console.log(url);
                            console.log(id);
                            var elem = $(this).closest('tr');


                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: {
                                    _method: 'delete',
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    id: id,
                                },
                                dataType: 'json',
                                success: function(result) {

                                    elem.fadeOut();

                                    //

                                    $('#empty').append(
                                        '<div class="alert alert-danger">لا يوجد بيانات</div>'
                                        );

                                    Toast2.fire({
                                        title: 'تم الحذف بنجاح',
                                        showConfirmButton: false,
                                        icon: 'success',
                                        timer: 1000
                                    });
                                } // end of success

                            }); // end of ajax

                        } else if (result.dismiss === Swal.DismissReason.cancel) {
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
        </script>
    @endpush
@endsection
