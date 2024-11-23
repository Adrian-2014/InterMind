@extends('guru.layout.main')

@section('title', 'Dashboard Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('ext-comp/calendar') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('css/guru/custom.css') }}" />
@endsection

@section('content')
    {{-- Layout Wrapper --}}
    <div class="layout-wrapper layout-content-navbar">

        {{-- Layout Container --}}
        <div class="layout-container">

            @include('guru.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">

                @include('guru.layout.nav')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="row data">
                        <div class="col-12 data-guru">
                            <div class="row">

                                {{-- Content --}}

                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12 banner">
                                            <div class="wrap">
                                                <div class="for-text">
                                                    <div class="welcome-text">
                                                        Selamat Datang, Adrian! 🎉
                                                    </div>
                                                    <div class="moto-text">
                                                        Buat lebih banyak Courses dan perluas cakrawala pengetahuan!
                                                    </div>
                                                    <a href="/guru-courses" class="to-course">
                                                        Buat Course
                                                    </a>
                                                </div>
                                                <div class="for-img">
                                                    <img src="{{ asset('dashboard-assets') }}/assets/img/illustrations/man-with-laptop-light.png"
                                                        height="140" alt="View Badge User"
                                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 user">
                                            <div class="wrap">
                                                <div class="title">
                                                    <i class="bi bi-person-circle"></i> USER TERATAS
                                                </div>
                                                <div class="tables">
                                                    <div class="table-head">
                                                        <div class="head courses-name">
                                                            Courses Name
                                                        </div>
                                                        <div class="head user-name">
                                                            User
                                                        </div>
                                                        <div class="head progres">
                                                            Progress
                                                        </div>
                                                        <div class="head rating">
                                                            Rating
                                                        </div>
                                                        <div class="head join-date">
                                                            Join Date
                                                        </div>
                                                    </div>
                                                    <div class="table-body">

                                                        @for ($i = 0; $i < 10; $i++)
                                                            <div class="list">
                                                                <div class="body courses-name">
                                                                    Latihan Bahasa Arab Lancar
                                                                </div>
                                                                <div class="body user-name">
                                                                    <div class="for-pp">
                                                                        <img src="{{ asset('property-img/profile.jpg') }}">
                                                                    </div>
                                                                    <div class="for-name">
                                                                        Vinsensius Ferrer Agung
                                                                    </div>
                                                                </div>
                                                                <div class="body progres">
                                                                    <div class="progress" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 70%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="txt">
                                                                        100%
                                                                    </div>
                                                                </div>
                                                                <div class="body rating">
                                                                    <i class="bi bi-star-fill"></i>
                                                                    <i class="bi bi-star-fill"></i>
                                                                    <i class="bi bi-star-fill"></i>
                                                                    <i class="bi bi-star-fill"></i>
                                                                    <i class="bi bi-star-fill"></i>
                                                                </div>
                                                                <div class="body join-date">
                                                                    88 NOVEMBER 2024
                                                                </div>
                                                                <div class="body dots dropstart">
                                                                    <button type="button" class="dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="bi bi-three-dots-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        Lihat Rincian
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-4">
                                    <div class="row statistic">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar chart">
                                                            <i class='bx bx-line-chart'></i>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="cardOpt3">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="name">Pengunjung</span>
                                                    <h3 class="valuation">25</h3>
                                                    <small class="year">2022 <span class="fw-light">-</span> 2024</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar bookmark">
                                                            <i class='bx bx-bookmark-heart'></i>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button" id="cardOpt6"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="cardOpt6">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="name">Bookmark</span>
                                                    <h3 class="valuation">12</h3>
                                                    <small class="year">2022 <span class="fw-light">-</span>
                                                        2024</small>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar courses">
                                                            <i class='bx bx-collection'></i>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button" id="cardOpt4"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="cardOpt4">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="name">Courses</span>
                                                    <h3 class="valuation">15</h3>
                                                    <small class="year">2022 <span class="fw-light">-</span>
                                                        2024</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar kategori">
                                                            <i class='bx bx-category'></i>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button" id="cardOpt1"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="javascript:void(0);">View
                                                                    More</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0);">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="name">Kategori</span>
                                                    <h3 class="valuation">2</h3>
                                                    <small class="year">2022 <span class="fw-light">-</span>
                                                        2024</small>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="calendar calendar-first" id="calendar_first">
                                                <div class="for-info dropstart">
                                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="bi bi-info-circle"></i>
                                                    </div>
                                                    <ul class="dropdown-menu">
                                                        <li class="list">
                                                            <div class="color-indicator new-all">

                                                            </div>
                                                            <div class="explanation">
                                                                Kamu Membuat Course, Materi, dan Kuis!
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-course">

                                                            </div>
                                                            <div class="explanation">
                                                                Kamu membuat Courses baru!
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-materi">

                                                            </div>
                                                            <div class="explanation">
                                                                Kamu menambahkan Materi baru ke dalam sebuah Course.
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-kuis">

                                                            </div>
                                                            <div class="explanation">
                                                                Kamu menambahkan sebuah Kuis ke dalam Course.
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-cm">

                                                            </div>
                                                            <div class="explanation">
                                                                Membuat Course & menambahkan Materi.
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-ck">

                                                            </div>
                                                            <div class="explanation">
                                                                Membuat Course & Sebuah Kuis.
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator new-mk">

                                                            </div>
                                                            <div class="explanation">
                                                                Kamu menambahkan Materi & Kuis!
                                                            </div>
                                                        </li>
                                                        <li class="list">
                                                            <div class="color-indicator today">

                                                            </div>
                                                            <div class="explanation">
                                                                Tanggal hari ini.
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="calendar_header">
                                                    <button class="switch-month switch-left">
                                                        <i class="bi bi-chevron-compact-left"></i>
                                                    </button>
                                                    <h2></h2>
                                                    <button class="switch-month switch-right">
                                                        <i class="bi bi-chevron-compact-right"></i>
                                                    </button>
                                                </div>
                                                <div class="calendar_weekdays"></div>
                                                <div class="calendar_content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Content --}}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

            </div>
            {{-- Layout Page --}}

        </div>
        {{-- Layout Container --}}

    </div>

    <!-- Overlay -->
    {{-- Layout Wrapper --}}
@endsection

@section('internal')

    <script src="{{ asset('ext-comp/calendar') }}/js/jquery.min.js"></script>
    <script src="{{ asset('ext-comp/calendar') }}/js/popper.js"></script>
    <script src="{{ asset('ext-comp/calendar') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('ext-comp/calendar') }}/js/main.js"></script>

    {{-- foreach ( as ) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var bikinCourse = "3";
            var bikinMateri = "12";
            var bikinKuis = "3";

            setTimeout(function() {
                document.querySelectorAll(".date").forEach((date) => {
                    var dateValue = date.innerHTML.trim();

                    if (dateValue == bikinCourse && dateValue == bikinMateri && dateValue ==
                        bikinKuis) {
                        date.classList.add("all-active"); // Prioritas 1

                    } else if (dateValue == bikinCourse && dateValue == bikinMateri) {
                        date.classList.add("cm-active"); // Prioritas 2
                    } else if (dateValue == bikinCourse && dateValue == bikinKuis) {
                        date.classList.add("ck-active"); // Prioritas 2
                    } else if (dateValue == bikinMateri && dateValue == bikinKuis) {
                        date.classList.add("mk-active"); // Prioritas 2

                    } else if (dateValue == bikinCourse) {
                        date.classList.add("course-active"); // Prioritas 3
                    } else if (dateValue == bikinMateri) {
                        date.classList.add("materi-active"); // Prioritas 3
                    } else if (dateValue == bikinKuis) {
                        date.classList.add("kuis-active"); // Prioritas 3
                    }
                });
            }, 100);
        });
    </script>
    {{-- endforeach --}}


    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                    });
                }, 1000);
            });
        </script>
    @elseif(session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        showConfirmButton: false,
                    });
                }, 1000);
            });
        </script>
    @endif

@endsection
