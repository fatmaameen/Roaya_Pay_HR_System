<nav class="navbar">
    <div class="heading">
      <div class="container">
        <div class="flex-data">
            <h1>{{ __('messages.ministry_industry') }}</h1>
          <div class="button-contain">
         
  <a href="{{ route('switch.language', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en']) }}" class="lang">
                        <span id="currentLang">{{ app()->getLocale() == 'en' ? 'AR' : 'EN' }}</span>
                        
                    </a>

            <a href="{{ route('contact') }}" class="custom-btn light-color">
                <span>
                    {{ __('messages.contact_us') }}
                </span>
              </a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="contain">
        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>

        <a href="{{ route('home') }}" class="brand-name">
            <img
            src="{{ asset('logo_image/' . $setting->logo) }}"
            loading="lazy"
            alt="" />
            <span>
                @if (App::getLocale() == 'ar')
                {{ $setting->ar_title }}
            @else
                {{ $setting->en_title }}
            @endif

              </span>
        </a>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link active">
                {{ __('messages.home') }}
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('news') }}" class="nav-link">
                {{ __('messages.news') }}
            </a>
        </li>

          <!-- <li class="nav-item">
            <a href="about-us.html" class="nav-link">
              عن الشركة
            </a>
          </li> -->

          <li class="nav-item">
            <a href="{{ route('web_products') }}" class="nav-link">
                {{ __('messages.company_products') }}
            </a>
        </li>

          <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link">
                {{ __('messages.categories') }}
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('all_tenders') }}" class="nav-link">
                {{ __('messages.tenders') }}
            </a>
        </li>
        @foreach($mainPages as $mainPage)
        @if($mainPage->children->count() > 0)
            <!-- إذا كانت الصفحة الرئيسية تحتوي على صفحات فرعية -->
            <li class="nav-item dropdown">
                <a href="{{ route('page_details', ['id' => $mainPage->id, 'lang' => app()->getLocale()]) }}" class="nav-link dropdown-toggle" data-toggle="dropdown">

                    {{ app()->getLocale() == 'ar' ? $mainPage->ar_title : $mainPage->en_title }}
                </a>
                <div class="dropdown-menu">
                    @foreach($mainPage->children as $subPage)
                        <a class="dropdown-item" href="{{ route('page_details', ['id' => $subPage->id, 'lang' => app()->getLocale()]) }}">

                            {{ app()->getLocale() == 'ar' ? $subPage->ar_title : $subPage->en_title }}
                        </a>
                    @endforeach
                </div>
            </li>
        @else
            <!-- إذا كانت الصفحة الرئيسية لا تحتوي على صفحات فرعية -->
            <li class="nav-item">
                <a href="{{ route('page_details', ['id' => $mainPage->id, 'lang' => app()->getLocale()]) }}" class="nav-link">
                    {{ app()->getLocale() == 'ar' ? $mainPage->ar_title : $mainPage->en_title }}
                </a>
            </li>
        @endif
    @endforeach

          {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              الشهادات
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <div class="sub-pages">
                <a class="dropdown-item" href="category.html">
                  اسم الشهادات
                </a>

                <ul class="sub-page-list">
                  <li>
                    <a href="#">
                      صفحه الشهادات
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      صفحه الشهادات
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      صفحه الشهادات
                    </a>
                  </li>
                </ul>
              </div>

              <a class="dropdown-item" href="category.html">
                الشهادات
              </a>
            </div>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
