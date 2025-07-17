<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12 mx-auto">
          <div class="contain">
            <a href="{{ route('home') }}" class="brand-name">
                <img
                src="{{ asset('logo_image/' . $setting->logo) }}"
                loading="lazy"
                alt=""
            />

            </a>

            <p>
                @if (App::getLocale() == 'ar')
                {!!$setting->ar_footer_description !!}
            @else
                {!! $setting->en_footer_description !!}
            @endif
            </p>

            <ul class="socail">

                    <li>
                        <a href="{{ $socials->facebook }}" target="_blank">
                            <img
                                src="{{ asset('assets/images/footer/facebook.svg') }}"
                                loading="lazy"
                                alt="Facebook"
                            />
                        </a>
                    </li>

                    <li>
                        <a href="{{ $socials->instagram }}" target="_blank">
                            <img
                                src="{{ asset('assets/images/footer/instagram.svg') }}"
                                loading="lazy"
                                alt="Instagram"
                            />
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ $socials->youtube }}" target="_blank">
                            <i class="fab fa-youtube" style="font-size: 24px;"></i>  <!-- استخدم أيقونة يوتيوب -->
                        </a>
                    </li> --}}

                    <!-- LinkedIn -->
                    <li>
                        <a href="{{ $socials->linked_in }}" target="_blank">
                            <img
                                src="{{ asset('assets/images/footer/linkedin.svg') }}"
                                loading="lazy"
                                alt=""
                            />
                        </a>
                    </li>


                    <li>
                        <a href="{{ $socials->twitter }}" target="_blank">
                            <img
                                src="{{ asset('assets/images/footer/x.svg') }}"
                                loading="lazy"
                                alt=""
                            />
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/{{ $socials->whatsApp }}" target="_blank">
                            <img
                                src="{{ asset('assets/images/footer/whatsapp.svg') }}"
                                loading="lazy"
                                alt=""
                            />
                        </a>
                    </li>
             
            </ul>

          </div>
        </div>
      </div>

      <div class="copyrights">
        <p>
            {{ __('messages.copyright') }} &copy; {{ date('Y') }}
        </p>
    </div>



    </div>
  </footer>
