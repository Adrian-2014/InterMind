{{-- Menu --}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('property-img/logo.png') }}">
            </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('guru-index') ? 'active' : '' }}">
            <a href="/guru-index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @yield('sub-stat') @if (Request::is('guru-course') || Request::is('guru-course_detail')) active @endif">
            <a href="/guru-course" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Course</div>
            </a>

            @yield('sub-menu')

        </li>


        <li class="menu-item @yield('sub-act') @if (Request::is('guru-answer_request') || Request::is('guru-answer_verivication')) active @endif">
            <a href="/guru-answer_request" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bulb"></i>

                <div data-i18n="Basic">Quiz</div>
            </a>

            @yield('sub-quiz')

        </li>

    </ul>
</aside>
{{-- Menu --}}
