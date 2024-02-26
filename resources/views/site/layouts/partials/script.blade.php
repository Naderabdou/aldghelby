<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('site/js/anime.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://kit.fontawesome.com/392319d0e8.js" crossorigin="anonymous"></script>
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('site/js/videos.js') }}"></script>
<script src="{{ asset('site/js/custom.js') }}"></script>
@if(Route::currentRouteName() !== 'site.service.show')
<script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3.9.0/dist/ScrollTrigger.min.js"></script>
<script src="{{ asset('site/js/locomotive-scroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('site/js/index.js') }}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('js')
<script>
    $(document).ready(function() {

        $(document).on('submit', '#form_subscribe', function(e) {
            e.preventDefault();
            $('#subscribe_submit').removeClass('ctm-btn').addClass('ctm-btn-send')
            $('#subscribe_submit').prop('disabled', true);
            var formData = new FormData($('#form_subscribe')[0]);
            $.ajax({
                url: "{{ route('site.subscribe') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#subscribe_submit').removeClass('ctm-btn-send').addClass('ctm-btn')
                    $('#subscribe_submit').prop('disabled', false);
                    $('#form_subscribe')[0].reset();
                    $('.error-message').text('')
                    Swal.fire({
                        icon: 'success',
                        title: `<h5> ${data.success}</h5> `,
                        showConfirmButton: false,
                        timer: 6000
                    });

                },
                error: function(data) {
                    $('.error-message').text('');
                    // Display validation errors under each input
                    var errors = data.responseJSON.errors;
                    Swal.fire({
                        icon: 'error',
                        title: `<h5> ${errors.email[0]}</h5> `,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    setTimeout(function() {
                        $('#form_subscribe')[0].reset();
                            }, 6000);


                    // $.each(errors, function(field, messages) {
                    //     var errorMessage = messages.join(', ');
                    //     //  console.log('#' + field + '_error');
                    //     $('#' + field + '_error').text(errorMessage);

                    // });

                    $('#subscribe_submit').removeClass('ctm-btn-send').addClass('ctm-btn')
                    $('#subscribe_submit').prop('disabled', false);

                },

            });

        })

         $(document).on('submit', '#form_contact', function(e){
            e.preventDefault();
                console.log('form_contact');
                $('#submit_contact').removeClass('ctm-btn').addClass('ctm-btn-send')
                $('#submit_contact').prop('disabled', true);
                var formData = new FormData($('#form_contact')[0]);
                $.ajax({
                    url: "{{ route('site.contactUs.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#submit_contact').removeClass('ctm-btn-send').addClass('ctm-btn')
                        $('#submit_contact').prop('disabled', false);
                        $('#form_contact')[0].reset();
                        $('.error-message').text('')
                        Swal.fire({
                            icon: 'success',
                            title: `<h5> ${data.success}</h5> `,
                            showConfirmButton: false,
                            timer: 2000
                        });

                    },
                    error: function(data) {
                        $('.error-message').text('');
                        // Display validation errors under each input
                        var errors = data.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            var errorMessage = messages.join(', ');
                            //  console.log('#' + field + '_error');
                            var errorElement = $('#' + field + '_error');
                            errorElement.text(errorMessage);

                            // Remove the error message after 1 minute
                            setTimeout(function() {
                                errorElement.text('');
                            }, 6000);
                        });

                        $('#submit_contact').removeClass('ctm-btn-send').addClass('ctm-btn')
                        $('#submit_contact').prop('disabled', false);
                    },

                });
         })





    })
</script>

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
