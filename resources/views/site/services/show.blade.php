@extends('site.layouts.app')
@section('title', __('تفاصيل الخدمة'))

@section('breadcrumb')
    <div class="title-page">
        <div class="main-container">
            <h2>{{ __('تفاصيل الخدمة') }}</h2>
            <div class="breadcrumb-header">
                <a href="{{ route('site.home') }}"> <i class="bi bi-house"></i>{{ __('الرئيسية') }}</a>
                <i class="bi bi-chevron-double-left"></i>
                <a href="{{ route('site.service.index') }}">{{ __('خدمات المكتب') }}</a>
                <i class="bi bi-chevron-double-left"></i>
                <span>{{ __('تفاصيل الخدمة') }}</span>
            </div>
        </div>
    </div>
@endsection

@section('content')






    <section class="service-details pg-section">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="main-service-details">
                        <div class="img-service-details">
                            <img src="{{ $service->image_path }}" alt="">
                        </div>
                        <div class="text-service-details">
                            <div class="icon-service-details">
                                <img src="{{ asset('site/images/s1.png') }}" alt="">
                                <h2>{{ $service->name }}</h2>
                            </div>
                            <p>
                                {{ $service->desc }}
                            </p>
                            <a id="services_btn" href="" data-toggle="modal" data-target="#serviceModalShow"
                                class="ctm-link2">
                                {{ __('اطلب الخدمة') }} <i class="bi bi-arrow-left"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="more-details">
                        <h2>{{ __('خدمات المكتب القانونية') }} </h2>
                        <ul>
                            @foreach ($Ourservice as $serviceFooter)
                                <li><a href="{{ route('site.service.show', $serviceFooter->id) }}"
                                        class="{{ $serviceFooter->id === $service->id ? 'active' : '' }}">{{ $serviceFooter->name }}<i
                                            class="bi bi-arrow-left"></i> </a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>


            <div class="counter-service mr-section">
                <div class="row row-gap">
                    <div class="col-lg-4">
                        <div class="sub-counter-service">
                            <div class="counter-box">
                                <span class="counter" data-number="{{ getSetting('years_of_experience')->value }}"></span>
                                <h2> {{ __('أعوام من الخبرة') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-counter-service">
                            <div class="counter-box">
                                <span class="counter" data-number="{{ getSetting('number_of_lawyers')->value }}"></span>
                                <h2>{{ __('محامي في الفريق') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sub-counter-service">
                            <div class="counter-box">
                                <span class="counter"
                                    data-number="{{ getSetting('number_of_success_cases')->value }}"></span>
                                <h2>{{ __('قضية ناجحة') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="serviceModalShow" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="oreder-servces">
                    <div class="main-container">
                        <div class="title-center">
                            <h2>{{ __('نموذج طلب الخدمة') }}</h2>
                        </div>


                        <form action="" id="services_form">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <div class="input-form">
                                <input type="text" placeholder="{{ __('الاسم بالكامل') }}" class="form-control"
                                    name="name">
                                <div style="color: red" id="name_error_services" class="error-message"></div>

                            </div>
                            <div class="input-form">
                                <input type="tel" placeholder="{{ __('رقم الجوال') }}" class="form-control"
                                    name="phone">
                                <div style="color: red" id="phone_error_services" class="error-message"></div>

                            </div>
                            <div class="input-form">
                                <input type="email" placeholder="{{ __('البريد الإلكتروني') }}" class="form-control"
                                    name="email">
                                <div style="color: red" id="email_error_services" class="error-message"></div>

                            </div>
                            <div class="input-form">
                                <textarea name="message" placeholder="{{ __('تفاصيل آخري') }}" class="form-control"></textarea>
                                <div style="color: red" id="message_error_services" class="error-message"></div>

                            </div>

                            <div class="btn-servces">
                                <button id="services_submit" class="ctm-btn w-100">{{ __('إرسال') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- ================================ Only Page Style and Scripts ================================ -->


@push('js')
    <script>
        $(document).ready(function() {


            $(document).on('submit', '#services_form', function(e) {
                e.preventDefault();
                $('#services_submit').removeClass('ctm-btn').addClass('ctm-btn-send')
                $('#services_submit').prop('disabled', true);
                var formData = new FormData($('#services_form')[0]);
                $.ajax({
                    url: "{{ route('site.service-order') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#serviceModalShow').modal('hide');

                        $('#services_submit').removeClass('ctm-btn-send').addClass('ctm-btn')
                        $('#services_submit').prop('disabled', false);
                        $('#services_form')[0].reset();
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
                        $.each(errors, function(field, messages) {
                            var errorMessage = messages.join(', ');
                            //  console.log('#' + field + '_error');
                            var errorElement = $('#' + field + '_error_services');
                            errorElement.text(errorMessage);

                            // Remove the error message after 1 minute
                            setTimeout(function() {
                                errorElement.text('');
                            }, 6000);
                        });

                        $('#services_submit').removeClass('ctm-btn-send').addClass('ctm-btn')
                        $('#services_submit').prop('disabled', false);
                    },




                });
            });

            // $(document).on('click', '#services_btn', function() {

            //     $('#serviceModalShow').modal('show');

            // $(".modal-backdrop").removeClass("modal-backdrop");
            //  });


            if ($(".counter").length) {
                var a = 0;
                $(window).scroll(function() {
                    var oTop = $(".counter-box").offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() > oTop) {
                        $(".counter").each(function() {
                            var $this = $(this),
                                countTo = $this.attr("data-number");
                            $({
                                countNum: $this.text(),
                            }).animate({
                                    countNum: countTo,
                                },

                                {
                                    duration: 2550,
                                    easing: "swing",
                                    step: function() {
                                        //$this.text(Math.ceil(this.countNum));
                                        $this.text(Math.ceil(this.countNum).toLocaleString(
                                            "en"));
                                    },
                                    complete: function() {
                                        $this.text(Math.ceil(this.countNum).toLocaleString(
                                            "en"));
                                        //alert('finished');
                                    },
                                }
                            );
                        });
                        a = 1;
                    }
                });

                const animationDuration = 4000;

                const frameDuration = 1000 / 60;

                const totalFrames = Math.round(animationDuration / frameDuration);

                const easeOutQuad = (t) => t * (2 - t);

                const animateCountUp = (el) => {
                    let frame = 0;
                    const countTo = parseInt(el.innerHTML, 10);

                    const counter = setInterval(() => {
                        frame++;

                        const progress = easeOutQuad(frame / totalFrames);

                        const currentCount = Math.round(countTo * progress);

                        if (parseInt(el.innerHTML, 10) !== currentCount) {
                            el.innerHTML = currentCount;
                        }

                        if (frame === totalFrames) {
                            clearInterval(counter);
                        }
                    }, frameDuration);
                };

                const countupEls = document.querySelectorAll(".timer");
                countupEls.forEach(animateCountUp);

                $(".animated-progress span").each(function() {
                    $(this).animate({
                            width: $(this).attr("data-progress") + "%",
                        },
                        2100
                    );
                    $(this).text($(this).attr("data-progress") + "%");
                });
            }
        });
    </script>
@endpush
