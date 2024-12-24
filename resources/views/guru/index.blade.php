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
                                                        Selamat Datang, {{ Auth::guard('teacher')->user()->name }}! 🎉
                                                    </div>
                                                    <div class="moto-text">
                                                        Buat lebih banyak Courses dan perluas cakrawala pengetahuan!
                                                    </div>
                                                    <a href="/guru-course" class="to-course">
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
                                                    <i class="bi bi-person-circle"></i> DAFTAR PELAJAR
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
                                                        <div class="head join-date">
                                                            Join Date
                                                        </div>
                                                    </div>
                                                    <div class="table-body">
                                                        @foreach ($course as $lists)
                                                            @foreach ($lists->user as $user)
                                                                @php
                                                                    $follower = \App\Models\Follow_course::where(
                                                                        'user_id',
                                                                        $user->id,
                                                                    )
                                                                        ->where('course_id', $lists->id)
                                                                        ->first();

                                                                    $totalQuiz = \App\Models\Quiz::where(
                                                                        'course_id',
                                                                        $lists->id,
                                                                    )->count();
                                                                    $completedQuiz = \App\Models\Answer::whereHas(
                                                                        'quiz',
                                                                        function ($query) use ($lists) {
                                                                            $query->where('course_id', $lists->id);
                                                                        },
                                                                    )
                                                                        ->where('user_id', $user->id)
                                                                        ->count();

                                                                    $progressPercentage =
                                                                        $totalQuiz > 0
                                                                            ? ($completedQuiz / $totalQuiz) * 100
                                                                            : 0;
                                                                    $progress = floor($progressPercentage);
                                                                @endphp
                                                                <div class="list">
                                                                    <div class="body courses-name">
                                                                        {{ $lists->name }}
                                                                    </div>
                                                                    <div class="body user-name">
                                                                        <div class="for-pp">
                                                                            <img
                                                                                src="{{ asset('property-img/profile.jpg') }}">
                                                                        </div>
                                                                        <div class="for-name">
                                                                            {{ $user->name }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="body progres">
                                                                        <div class="progress" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            <div class="progress-bar"
                                                                                style="width: {{ $progress }}%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="txt">
                                                                            {{ $progress }}%
                                                                        </div>
                                                                    </div>
                                                                    <div class="body join-date">
                                                                        {{ \Carbon\Carbon::parse($follower->created_at)->translatedFormat('j F Y') }}
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endforeach
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
                                                            <i class="bi bi-question-circle"></i>
                                                        </div>

                                                    </div>
                                                    <span class="name">Quiz</span>
                                                    <h3 class="valuation">{{ $QuizCount }}</h3>
                                                    <small class="year">
                                                        @if (!$lastQuiz || !$firstQuiz)
                                                            -
                                                        @elseif (
                                                            \Carbon\Carbon::parse($lastQuiz->created_at)->translatedFormat('Y') ===
                                                                \Carbon\Carbon::parse($firstQuiz->created_at)->translatedFormat('Y'))
                                                            {{ \Carbon\Carbon::parse($lastQuiz->created_at)->translatedFormat('Y') }}
                                                        @else
                                                            {{ \Carbon\Carbon::parse($firstQuiz->created_at)->translatedFormat('Y') }}
                                                            <span class="fw-light">-</span>
                                                            {{ \Carbon\Carbon::parse($lastQuiz->created_at)->translatedFormat('Y') }}
                                                        @endif
                                                    </small>
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
                                                    </div>
                                                    <span class="name">Pengikut</span>
                                                    <h3 class="valuation">{{ $followersCount }}</h3>
                                                    <small class="year">
                                                        @if (!$lastFollower || !$firstFollower)
                                                            -
                                                        @elseif (
                                                            \Carbon\Carbon::parse($lastFollower->created_at)->translatedFormat('Y') ===
                                                                \Carbon\Carbon::parse($firstFollower->created_at)->translatedFormat('Y'))
                                                            {{ \Carbon\Carbon::parse($lastFollower->created_at)->translatedFormat('Y') }}
                                                        @else
                                                            {{ \Carbon\Carbon::parse($firstFollower->created_at)->translatedFormat('Y') }}
                                                            <span class="fw-light">-</span>
                                                            {{ \Carbon\Carbon::parse($lastFollower->created_at)->translatedFormat('Y') }}
                                                        @endif
                                                    </small>

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
                                                    </div>
                                                    <span class="name">Courses</span>
                                                    <h3 class="valuation">{{ $courseCount }}</h3>
                                                    <small class="year">
                                                        @if (!$lastCourse || !$firstCourse)
                                                            -
                                                        @elseif (
                                                            \Carbon\Carbon::parse($lastCourse->created_at)->translatedFormat('Y') ===
                                                                \Carbon\Carbon::parse($firstCourse->created_at)->translatedFormat('Y'))
                                                            {{ \Carbon\Carbon::parse($lastCourse->created_at)->translatedFormat('Y') }}
                                                        @else
                                                            {{ \Carbon\Carbon::parse($firstCourse->created_at)->translatedFormat('Y') }}
                                                            <span class="fw-light">-</span>
                                                            {{ \Carbon\Carbon::parse($lastCourse->created_at)->translatedFormat('Y') }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="card-title d-flex align-items-start justify-content-between">
                                                        <div class="avatar kategori">
                                                            <i class="bi bi-folder2-open"></i>
                                                        </div>
                                                    </div>
                                                    <span class="name">Materi</span>
                                                    <h3 class="valuation">{{ $MateriCount }}</h3>
                                                    <small class="year">
                                                        @if (!$lastMateri || !$firstMateri)
                                                            -
                                                        @elseif (
                                                            \Carbon\Carbon::parse($lastMateri->created_at)->translatedFormat('Y') ===
                                                                \Carbon\Carbon::parse($firstMateri->created_at)->translatedFormat('Y'))
                                                            {{ \Carbon\Carbon::parse($lastMateri->created_at)->translatedFormat('Y') }}
                                                        @else
                                                            {{ \Carbon\Carbon::parse($firstMateri->created_at)->translatedFormat('Y') }}
                                                            <span class="fw-light">-</span>
                                                            {{ \Carbon\Carbon::parse($lastMateri->created_at)->translatedFormat('Y') }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="calendar calendar-first" id="calendar_first">
                                                {{-- <div class="for-info dropstart">
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
                                                </div> --}}
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
