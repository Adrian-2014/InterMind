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
        <li class="menu-item {{ Request::is('admin-index') ? 'active' : '' }}">
            <a href="/admin-index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin-course_type') ? 'active' : '' }}">
            <a href="/admin-course_type" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Basic">Tipe Course</div>
            </a>
        </li>
    </ul>
</aside>
{{-- Menu --}}
