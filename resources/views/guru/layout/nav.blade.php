<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center">
            <li class="data">
                <div class="name">
                    {{ Auth::guard('teacher')->user()->name }}
                </div>
                <div class="role">
                    Guru
                </div>
            </li>
        </ul>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-profil"
                aria-controls="offcanvasRight">
                <a class="nav-link dropdown-toggle hide-arrow">
                    <div class="for-profil-nav">
                        @if (!is_null(Auth::guard('teacher')->user()->profil))
                            <img src="{{ asset('Uploads/for-profil/' . Auth::guard('teacher')->user()->profil) }}">
                        @else
                            <img src="{{ asset('property-img/profile.jpg') }}">
                        @endif
                    </div>
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- / Navbar -->


@if (Auth::guard('teacher')->check())
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
                        <form action="/guru-logout" method="post">
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
                        @if (!is_null(Auth::guard('teacher')->user()->profil))
                            <img src="{{ asset('Uploads/for-profil/' . Auth::guard('teacher')->user()->profil) }}">
                        @else
                            <img src="{{ asset('property-img/profile.jpg') }}">
                        @endif
                    </div>

                    <div class="action" data-bs-target="#edit-profil" data-bs-toggle="modal">
                        <i class="bi bi-camera"></i>
                    </div>
                </div>
                <div class="prof-general">
                    <div class="pro-name">
                        {{ Auth::guard('teacher')->user()->name }}
                    </div>
                    <div class="pro-email">
                        {{ Auth::guard('teacher')->user()->email }}
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
                                {{ Auth::guard('teacher')->user()->name }}
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
                                {{ Auth::guard('teacher')->user()->email }}
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
                                {{ Auth::guard('teacher')->user()->no_telepon }}
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
                                {{ \Carbon\Carbon::parse(Auth::guard('teacher')->user()->tanggal_lahir)->translatedFormat('j F Y') }}
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
                                {{ Auth::guard('teacher')->user()->jenis_kelamin }}
                            </div>
                            <div class="act" data-bs-target="#edit-jk" data-bs-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </div>
                        <div class="for-sep">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                    </div>
                    <div class="list">
                        <div class="label">
                            Tanggal Bergabung
                        </div>
                        <div class="isi">
                            <div class="isis">
                                {{ \Carbon\Carbon::parse(Auth::guard('teacher')->user()->created_at)->translatedFormat('j F Y') }}
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


{{-- EDITZ --}}
@if (Auth::guard('teacher')->check())
    <div class="modal fade editz" id="edit-name" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_name" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nama</label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-feather"></i>
                                    </div>
                                    <input autocomplete="off" type="text" class="form-control" name="name"
                                        required maxlength="25" value="{{ Auth::guard('teacher')->user()->name }}"
                                        placeholder="Thomas Shelby..">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editz" id="edit-email" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_email" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-at"></i>
                                    </div>
                                    <input autocomplete="off" type="email" class="form-control" name="email"
                                        required maxlength="35" value="{{ Auth::guard('teacher')->user()->email }}"
                                        placeholder="example@gmail.com">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editz" id="edit-notelp" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_notelp" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nomor Telepon</label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <input autocomplete="off" type="text" class="form-control"
                                        name="nomor_telepon" required maxlength="13"
                                        value="{{ Auth::guard('teacher')->user()->no_telepon }}"
                                        placeholder="08xxx..">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editz" id="edit-tl" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_tl" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Tanggal Lahir</label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-calendar2-week"></i>
                                    </div>
                                    <input autocomplete="off" type="date" class="form-control"
                                        name="tanggal_lahir" required
                                        value="{{ Auth::guard('teacher')->user()->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editz" id="edit-jk" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_jk" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 drop" x-data="{ jk: '{{ Auth::guard('teacher')->user()->jenis_kelamin }}' }">
                                <label class="form-label">Jenis Kelamin</label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                    <input autocomplete="off" type="text" class="form-control" required
                                        name="jenis_kelamin" maxlength="25" placeholder="laki laki / perempuan.."
                                        readonly x-model="jk">
                                    <div class="dropdown">
                                        <div class=" dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="bi bi-caret-down-fill"></i>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="man" @click = "jk ='Laki-Laki'">
                                                <div class="for-icon">
                                                    <i class="bi bi-gender-male"></i>
                                                </div>
                                                <div class="text">
                                                    Laki Laki
                                                </div>
                                            </li>
                                            <li class="woman" @click = "jk ='Perempuan'">
                                                <div class="for-icon">
                                                    <i class="bi bi-gender-female"></i>
                                                </div>
                                                <div class="text">
                                                    Perempuan
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editz" id="edit-profil" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/guru-editprofil_profil" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Profil <span>(Disarankan 1 : 1)</span></label>
                                <input autocomplete="off" type="hidden" name="id"
                                    value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="in-wrap">
                                    {{-- <div class="logo">
                                        <i class="bi bi-person-bounding-box"></i>
                                    </div> --}}
                                    <input autocomplete="off" type="file" class="form-control"name="profil"
                                        required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="submits">
                            <div class="txt">
                                SIMPAN
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-pen"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- EDITZ --}}
