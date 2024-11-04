<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-profil"
                aria-controls="offcanvasRight">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <img src="{{ asset('dashboard-assets') }}/assets/img/avatars/1.png" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<!-- / Navbar -->


@if (Auth::guard('web')->check())
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-profil" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <div class="for-logo">
                <img src="{{ asset('property-img/logo.png') }}">
            </div>
            <div class="dropstart">
                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-list"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <form action="logout" method="post">
                            @csrf
                            <button type="submit">
                                <i class="bi bi-power"></i>
                                <div class="txt">
                                    Logout
                                </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas-body">

            <div class="prof-main">
                <div class="prof-pic">
                    <div class="profil-content">
                        <img src="{{ asset('property-img/profile.jpg') }}">
                    </div>

                    <div class="action" data-bs-target="#edit-profil" data-bs-toggle="modal">
                        <i class="bi bi-camera"></i>
                    </div>
                </div>
                <div class="prof-general">
                    <div class="pro-name">
                        {{ Auth::guard('web')->user()->name }}
                    </div>
                    <div class="pro-email">
                        {{ Auth::guard('web')->user()->email }}
                    </div>
                </div>
            </div>

            <div class="prof-data">
                <div class="head">
                    <i class="bi bi-person-fill"></i>
                    <div class="for-txt">
                        INFO PROFIL
                    </div>
                </div>

                <div class="content">
                    <div class="list">
                        <div class="label">
                            Nama
                        </div>
                        <div class="isi">
                            <div class="isis">
                                {{ Auth::guard('web')->user()->name }}
                            </div>
                            <div class="act" data-bs-target="#edit-name" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                    <div class="list">
                        <div class="label">
                            Email
                        </div>
                        <div class="isi">
                            <div class="isis">
                                {{ Auth::guard('web')->user()->email }}
                            </div>
                            <div class="act" data-bs-target="#edit-email" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                    <div class="list">
                        <div class="label">
                            Nomor Telepon
                        </div>
                        <div class="isi">
                            <div class="isis let">
                                {{ Auth::guard('web')->user()->no_telepon }}
                            </div>
                            <div class="act" data-bs-target="#edit-notelp" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                    <div class="list">
                        <div class="label">
                            Tanggal Lahir
                        </div>
                        <div class="isi">
                            <div class="isis">
                                {{-- {{ $tanggal_lahir }} --}}
                            </div>
                            <div class="act" data-bs-target="#edit-tl" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                    <div class="list">
                        <div class="label">
                            Jenis Kelamin
                        </div>
                        <div class="isi">
                            <div class="isis">
                                {{ Auth::guard('web')->user()->jenis_kelamin }}
                            </div>
                            <div class="act" data-bs-target="#edit-jk" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endif
