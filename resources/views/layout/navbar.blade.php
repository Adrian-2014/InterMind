<nav class="navbar fixed-top" id="navs">
    <div class="navbar-content">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('property-img/logo.png') }}">

        </a>
        <div class="nav-navigation">
            <div class="link">
                <a href="">Home</a>
            </div>
            <div class="link">
                <a href="">Courses</a>
            </div>
            <div class="link">
                <a href="">About</a>
            </div>
            {{-- <div class="link help">
                <a href="">Help</a>
            </div> --}}
        </div>

        @if (Auth::guard('web')->check())
            <div class="profil" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-profil"
                aria-controls="offcanvasRight">
                <div class="for-name">
                    {{ Auth::guard('web')->user()->name }}
                </div>
                <div class="profils">
                    <div class="for-img">
                        @if (!is_null(Auth::guard('web')->user()->profil))
                            <img src="{{ asset('Uploads/for-profil/' . Auth::guard('web')->user()->profil) }}">
                        @else
                            <img src="{{ asset('property-img/profile.jpg') }}">
                        @endif

                    </div>
                </div>
            </div>
        @else
            <div class="dropdown-center">
                <button class="dropdown-toggle login-btn" id="login-btn" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    MASUK / DAFTAR
                </button>
                <ul class="dropdown-menu">
                    <li data-bs-toggle="modal" data-bs-target="#login">
                        <a class="dropdown-item" href="#">
                            <div class="icon">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <div class="text">
                                Masuk
                            </div>
                        </a>
                    </li>
                    <li data-bs-toggle="modal" data-bs-target="#regist">
                        <a class="dropdown-item" href="#">
                            <div class="icon">
                                <i class="bi bi-person-fill-add"></i>
                            </div>
                            <div class="text">
                                Daftar
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        @endif

    </div>
</nav>

{{-- EDITZ --}}
@if (Auth::guard('web')->check())
    <div class="modal fade editz" id="edit-name" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/editprofil_name" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nama</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-feather"></i>
                                    </div>
                                    <input type="text" class="form-control" name="name" required maxlength="25"
                                        value="{{ Auth::guard('web')->user()->name }}" placeholder="Thomas Shelby..">
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
                    <form action="/editprofil_email" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-at"></i>
                                    </div>
                                    <input type="email" class="form-control" name="email" required maxlength="35"
                                        value="{{ Auth::guard('web')->user()->email }}" placeholder="example@gmail.com">
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
                    <form action="/editprofil_notelp" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nomor_telepon" required
                                        maxlength="13" value="{{ Auth::guard('web')->user()->no_telepon }}"
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
                    <form action="/editprofil_tl" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-calendar2-week"></i>
                                    </div>
                                    <input type="date" class="form-control" name="tanggal_lahir" required
                                        value="{{ Auth::guard('web')->user()->tanggal_lahir }}">
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
                    <form action="/editprofil_jk" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 drop" x-data="{ jk: '{{ Auth::guard('web')->user()->jenis_kelamin }}' }">
                                <label class="form-label">Jenis Kelamin</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                    <input type="text" class="form-control" required name="jenis_kelamin"
                                        maxlength="25" placeholder="laki laki / perempuan.." readonly x-model="jk">
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
                    <form action="/editprofil_profil" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Profil <span>(Disarankan 1 : 1)</span></label>
                                <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">
                                <div class="in-wrap">
                                    {{-- <div class="logo">
                                        <i class="bi bi-person-bounding-box"></i>
                                    </div> --}}
                                    <input type="file" class="form-control"name="profil" required>
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


{{-- FOR MODAL LOGIN --}}
<div class="modal fade log" id="login" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-head">
                    <img src="{{ asset('property-img/logo.png') }}">
                </div>
                <div class="couple-btn">
                    <div class="ele active" id="pelajar">
                        <div class="imgs">
                            <img src="{{ asset('property-img/student-light.png') }}" id="imgu-login">
                        </div>
                        <div class="names">
                            Pelajar
                        </div>
                    </div>
                    <div class="ele" id="guru">
                        <div class="imgs">
                            <img src="{{ asset('property-img/teacher-dark.png') }}" id="imgg-login">
                        </div>
                        <div class="names">
                            Guru
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="fucking-form">
                    <div class="formulir for-pelajar active" id="formulir-pelajar">
                        <form action="login-user" method="POST">
                            @csrf
                            <div class="text">
                                Login Sebagai Pelajar
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <div class="in-wrap">
                                        <div class="logo">
                                            <i class="bi bi-at"></i>
                                        </div>
                                        <input type="email" class="form-control" name="email" required
                                            maxlength="35" placeholder="example@gmail..">
                                    </div>
                                </div>
                                <div class="col-12 pass">
                                    <label class="form-label">Password</label>

                                    <div class="special">
                                        <div class="logo">
                                            <i class="bi bi-key"></i>
                                        </div>
                                        <input type="password" class="form-control target" name="password" required
                                            maxlength="35" placeholder="password#123..">
                                        <div class="toggles">
                                            <i class="bi bi-eye-slash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forget-pass">
                                <a href="">
                                    Lupa password?
                                </a>
                            </div>

                            <button type="submit" class="submits">
                                <div class="txt">
                                    LOGIN
                                </div>
                                <div class="for-icon-show">
                                    <i class="bi bi-chevron-compact-right"></i>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div class="formulir for-guru" id="formulir-guru">
                        <form action="login-guru" method="POST">
                            @csrf
                            <div class="text">
                                Login Sebagai Guru
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <div class="in-wrap">
                                        <div class="logo">
                                            <i class="bi bi-at"></i>
                                        </div>
                                        <input type="email" class="form-control" name="email" required
                                            maxlength="35" placeholder="example@gmail..">
                                    </div>
                                </div>
                                <div class="col-12 pass">
                                    <label class="form-label">Password</label>

                                    <div class="special">
                                        <div class="logo">
                                            <i class="bi bi-key"></i>
                                        </div>
                                        <input type="password" class="form-control target" name="password" required
                                            maxlength="35" placeholder="password#123..">
                                        <div class="toggles">
                                            <i class="bi bi-eye-slash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="forget-pass">
                                <a href="">
                                    Lupa password?
                                </a>
                            </div>

                            <button type="submit" class="submits">
                                <div class="txt">
                                    LOGIN
                                </div>
                                <div class="for-icon-show">
                                    <i class="bi bi-chevron-compact-right"></i>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FOR MODAL LOGIN --}}


{{-- MODAL REGISTER --}}
<div class="modal fade reg" id="regist" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-head">
                    <img src="{{ asset('property-img/logo.png') }}">
                </div>
                <div class="couple-btn">
                    <div class="ele active" id="reg-pelajar">
                        <div class="imgs">
                            <img src="{{ asset('property-img/student-light.png') }}" id="imgu-reg">
                        </div>
                        <div class="names">
                            Pelajar
                        </div>
                    </div>
                    <div class="ele" id="reg-guru">
                        <div class="imgs">
                            <img src="{{ asset('property-img/teacher-dark.png') }}" id="imgg-reg">
                        </div>
                        <div class="names">
                            Guru
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="formulir for-pelajar active" id="form-pelajar">
                    <form action="register-user" method="post">
                        @csrf
                        <div class="text">
                            Daftar sebagai Pelajar
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-at"></i>
                                    </div>
                                    <input type="email" class="form-control" required name="email"
                                        maxlength="35" placeholder="example@gmail..">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <input type="text" class="form-control" required name="name"
                                        maxlength="25" placeholder="Thomas Shelby..">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">No. Telepon</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <input type="tel" class="form-control" required name="no_telepon"
                                        maxlength="13" placeholder="08xxxx.."
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-calendar2-week"></i>
                                    </div>
                                    <input type="date" class="form-control" required name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-6 drop" x-data="{ jk: '' }">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                    <input type="text" class="form-control" required name="jenis_kelamin"
                                        maxlength="25" placeholder="laki laki / perempuan.." readonly x-model="jk">
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
                            <div class="col-6 pass">
                                <label class="form-label">Password</label>
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <input type="password" class="form-control target" required name="password"
                                        maxlength="35" placeholder="password#123..">
                                    <div class="toggles">
                                        <i class="bi bi-eye-slash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="submits">
                            <div class="txt">
                                DAFTAR
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-chevron-compact-right"></i>
                            </div>
                        </button>
                    </form>
                </div>
                <div class="formulir for-guru" id="form-guru">
                    <form action="register-guru" method="post">
                        @csrf
                        <div class="text">
                            Daftar sebagai Guru
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-at"></i>
                                    </div>
                                    <input type="email" class="form-control" required name="email"
                                        maxlength="35" placeholder="example@gmail..">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nama</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <input type="text" class="form-control" required name="name"
                                        maxlength="25" placeholder="Thomas Shelby..">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">No. Telepon</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <input type="tel" class="form-control" required name="no_telepon"
                                        maxlength="13" placeholder="08xxxx.."
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="in-wrap">
                                    <div class="logo">
                                        <i class="bi bi-calendar2-week"></i>
                                    </div>
                                    <input type="date" class="form-control" required name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-6 drop" x-data="{ jk: '' }">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </div>
                                    <input type="text" class="form-control" required name="jenis_kelamin"
                                        maxlength="25" placeholder="laki laki / perempuan.." readonly x-model="jk">
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
                            <div class="col-6 pass">
                                <label class="form-label">Password</label>
                                <div class="special">
                                    <div class="logo">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <input type="password" class="form-control target" required name="password"
                                        maxlength="35" placeholder="password#123..">
                                    <div class="toggles">
                                        <i class="bi bi-eye-slash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="submits">
                            <div class="txt">
                                DAFTAR
                            </div>
                            <div class="for-icon-show">
                                <i class="bi bi-chevron-compact-right"></i>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- MODAL REGISTER --}}

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
                        @if (!is_null(Auth::guard('web')->user()->profil))
                            <img src="{{ asset('Uploads/for-profil/' . Auth::guard('web')->user()->profil) }}">
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
                                {{ $tanggal_lahir }}
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
