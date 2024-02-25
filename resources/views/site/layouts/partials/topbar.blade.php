<div class="top-bar">
    <div class="main-container">
        <div class="info-contactus-header">

            <div class="sub-contactus-header">
                <div class="icon-info-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M29.2934 24.44C29.2934 24.92 29.1867 25.4133 28.9601 25.8933C28.7334 26.3733 28.4401 26.8266 28.0534 27.2533C27.4001 27.9733 26.6801 28.4933 25.8667 28.8266C25.0667 29.16 24.2001 29.3333 23.2667 29.3333C21.9067 29.3333 20.4534 29.0133 18.9201 28.36C17.3867 27.7066 15.8534 26.8266 14.3334 25.72C12.8001 24.6 11.3467 23.36 9.96008 21.9866C8.58675 20.6 7.34675 19.1466 6.24008 17.6266C5.14675 16.1066 4.26675 14.5866 3.62675 13.08C2.98675 11.56 2.66675 10.1066 2.66675 8.71996C2.66675 7.81329 2.82675 6.94663 3.14675 6.14663C3.46675 5.33329 3.97341 4.58663 4.68008 3.91996C5.53341 3.07996 6.46675 2.66663 7.45342 2.66663C7.82675 2.66663 8.20008 2.74663 8.53342 2.90663C8.88008 3.06663 9.18675 3.30663 9.42675 3.65329L12.5201 8.01329C12.7601 8.34663 12.9334 8.65329 13.0534 8.94663C13.1734 9.22663 13.2401 9.50663 13.2401 9.75996C13.2401 10.08 13.1467 10.4 12.9601 10.7066C12.7867 11.0133 12.5334 11.3333 12.2134 11.6533L11.2001 12.7066C11.0534 12.8533 10.9867 13.0266 10.9867 13.24C10.9867 13.3466 11.0001 13.44 11.0267 13.5466C11.0667 13.6533 11.1067 13.7333 11.1334 13.8133C11.3734 14.2533 11.7867 14.8266 12.3734 15.52C12.9734 16.2133 13.6134 16.92 14.3067 17.6266C15.0267 18.3333 15.7201 18.9866 16.4267 19.5866C17.1201 20.1733 17.6934 20.5733 18.1467 20.8133C18.2134 20.84 18.2934 20.88 18.3867 20.92C18.4934 20.96 18.6001 20.9733 18.7201 20.9733C18.9467 20.9733 19.1201 20.8933 19.2667 20.7466L20.2801 19.7466C20.6134 19.4133 20.9334 19.16 21.2401 19C21.5467 18.8133 21.8534 18.72 22.1867 18.72C22.4401 18.72 22.7067 18.7733 23.0001 18.8933C23.2934 19.0133 23.6001 19.1866 23.9334 19.4133L28.3467 22.5466C28.6934 22.7866 28.9334 23.0666 29.0801 23.4C29.2134 23.7333 29.2934 24.0666 29.2934 24.44Z"
                            stroke="white" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
                <div class="text-info-header">
                    <h3> {{ __('اتصل بنا') }} </h3>
                    <p>
                        <a href="tel:{{ getSetting('phone')->value }}">{{ getSetting('phone')->value }}</a> -
                        <a href="tel:{{ getSetting('phone_other')->value }}">{{ getSetting('phone_other')->value }}</a>




                    </p>
                </div>
            </div>

            <a target="__blank" href="mailto::{{ getSetting('email')->value }}">
                <div class="sub-contactus-header">
                    <div class="icon-info-header">

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
                            <path
                                d="M11.3334 25.3333H10.6667C5.33341 25.3333 2.66675 24 2.66675 17.3333V10.6666C2.66675 5.33329 5.33341 2.66663 10.6667 2.66663H21.3334C26.6667 2.66663 29.3334 5.33329 29.3334 10.6666V17.3333C29.3334 22.6666 26.6667 25.3333 21.3334 25.3333H20.6667C20.2534 25.3333 19.8534 25.5333 19.6001 25.8666L17.6001 28.5333C16.7201 29.7066 15.2801 29.7066 14.4001 28.5333L12.4001 25.8666C12.1867 25.5733 11.6934 25.3333 11.3334 25.3333Z"
                                stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21.3285 14.6667H21.3405" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15.9941 14.6667H16.006" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M10.6593 14.6667H10.6713" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="text-info-header">
                        <h3> {{ __('البريد الالكتروني') }} </h3>
                        <p>{{ getSetting('email')->value }}</p>
                    </div>
                </div>
            </a>
            <a target="__blank"
                href="https://www.google.com/maps?q={{ getSetting('lat')->value }},{{ getSetting('lng')->value }}">
                <div class="sub-contactus-header">
                    <div class="icon-info-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
                            <path
                                d="M16.0001 17.9067C18.2976 17.9067 20.1601 16.0442 20.1601 13.7467C20.1601 11.4492 18.2976 9.58667 16.0001 9.58667C13.7026 9.58667 11.8401 11.4492 11.8401 13.7467C11.8401 16.0442 13.7026 17.9067 16.0001 17.9067Z"
                                stroke="white" stroke-width="1.5" />
                            <path
                                d="M4.8266 11.32C7.45327 -0.226704 24.5599 -0.213371 27.1733 11.3333C28.7066 18.1066 24.4933 23.84 20.7999 27.3866C18.1199 29.9733 13.8799 29.9733 11.1866 27.3866C7.5066 23.84 3.29327 18.0933 4.8266 11.32Z"
                                stroke="white" stroke-width="1.5" />
                        </svg>
                    </div>
                    <div class="text-info-header">
                        <h3> {{ __('العنوان') }} </h3>
                        <p> {{ transWord(getSetting('address')->value, app()->getLocale()) }} </p>
                    </div>
                </div>
            </a>
        </div>


        <div class="soc-media-header">
            <ul>
                <li><a target="__blank" href="{{ getSetting('twitter')->value }}"><i class="bi bi-twitter-x"></i></a>
                </li>
                <li><a target="__blank" href="{{ getSetting('instagram')->value }}"><i class="bi bi-instagram"></i></a>
                </li>
                <li><a target="__blank" href="{{ getSetting('facebook')->value }}"><i class="bi bi-facebook"></i></a>
                </li>
                <li><a target="__blank" href="{{ getSetting('snapchat')->value }}"><i class="bi bi-snapchat"></i></a>
                </li>
            </ul>
        </div>

    </div>
</div>
