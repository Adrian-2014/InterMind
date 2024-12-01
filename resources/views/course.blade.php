@extends('layout.main')

@section('title', 'Course')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

{{-- for navbar --}}
@section('home', '/')
@section('about', '/#about-link')
{{-- for navbar --}}

@section('content')

    <!-- Navbar -->
    @include('layout.navbar')
    <!-- Navbar -->

    <section class="course">
        <div class="back">
            <a href="/" class="for-icon">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="course-contain">
            <div class="for-img">
                <img src="{{ asset('Uploads/for-course/' . $course->gambar) }}">
            </div>
            <div class="for-detail">
                <div class="header">
                    <div class="for-icon">
                        <i class="bi bi-box"></i>
                    </div>
                    <div class="header-text">
                        INFORMASI COURSE
                    </div>
                </div>
                <div class="main-content">
                    <div class="top">
                        <div class="for-name">
                            {{ $course->name }}
                        </div>

                        <div class="for-deskripsi">
                            {{ $course->deskripsi }}
                        </div>

                        <div class="for-made">
                            <div class="txt">
                                Dibuat Oleh:
                            </div>
                            <div class="value">
                                <span class="t-name"> {{ $course->teacher->name }}</span>, <span class="t-email">
                                    {{ $course->teacher->email }} </span>
                            </div>
                        </div>

                        <div class="for-type">
                            <div class="txt">
                                Tipe Course:
                            </div>
                            <div class="value">
                                {{ $course->type->name_type }}
                            </div>
                        </div>

                        <div class="for-rating">
                            <div class="txt">
                                Rating:
                            </div>
                            <div class="value">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star"></i>
                                </div>

                                <div class="users">
                                    14 Riviewers
                                </div>
                            </div>
                        </div>

                        <div class="for-follow">
                            <form action="">
                                <button type="submit">
                                    <div class="text">
                                        Ikuti Course
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="bottom for-date">
                        <span class="text">Diunggah pada </span>
                        <span class="value">
                            {{ \Carbon\Carbon::parse($course->created_at)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="start-learn">
        <div class="heading">
            <div class="left">
                <div class="title">
                    Belajar Sekarang!
                </div>
                <div class="sub-title">
                    Pelajari materi & Kerjakan Kuis untuk mengembangkan pengetahuan mu.
                </div>
            </div>
            <div class="right">
                <div class="title-progress">Progress Kamu</div>
                <div class="progres">
                    <div class="progress" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 70%;">
                        </div>
                    </div>
                    <div class="rate">70%</div>
                </div>
            </div>
        </div>

        <div class="content-course">
            <div class="learn">

                <div class="item">
                    <div class="for-info">
                        <div class="for-logo">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="side">
                            <div class="name">
                                Medan magnet dan resource sumber daya
                            </div>
                            <div class="tanggal">17 November 1998</div>
                        </div>
                    </div>

                    <div class="action">
                        <div class="button">
                            <i class="bi bi-play-fill"></i>
                            <div class="txt">
                                MULAI
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="quiz">
                <div class="item">
                    <div class="for-info">
                        <div class="for-logo">
                            <i class="bi bi-question-lg"></i>
                        </div>
                        <div class="side">
                            <div class="name">
                                Tes Pengetahuan 1
                            </div>
                            <div class="status">
                                <i class="bi bi-check2-circle"></i>
                                <div class="txt">
                                    Belum dikerjakan
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action">
                        <div class="button">
                            <i class="bi bi-cursor"></i>
                            <div class="txt">
                                KERJAKAN
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="information">
        <div class="for-img">
            <img src="{{ asset('Uploads/for-course_type/' . $course->type->gambar) }}">
        </div>

        <div class="wrap">
            <div class="top">
                <div class="name">
                    {{ $course->type->name_type }}
                </div>
                <div class="description">
                    {{ $course->type->deskripsi }}
                </div>
            </div>
            <div class="by">
                <span class="present">Present by</span>
                <span class="by-who">INTERMIND</span>
            </div>
        </div>
    </div>

@endsection

@section('internal')

@endsection
