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

                        <div class="top-tops">
                            <div class="for-name">
                                {{ $course->name }}
                            </div>

                            <div class="for-deskripsi">
                                {{ $course->deskripsi }}
                            </div>
                        </div>

                        <div class="top-bots">
                            <div class="fors">
                                <div class="for-made">
                                    <div class="txt">
                                        Dibuat Oleh:
                                    </div>
                                    <div class="value">
                                        <span class="t-name"> {{ $course->teacher->name }}</span>
                                    </div>
                                </div>

                                <div class="for-type">
                                    <div class="txt">
                                        Tipe Course:
                                    </div>
                                    <div class="value">
                                        {{ $course->type_course->name_type }}
                                    </div>
                                </div>

                                <div class="for-rating">
                                    <div class="txt">
                                        Rating:
                                    </div>
                                    <div class="value">
                                        <div class="stars">
                                            @for ($i = 0; $i < $rating; $i++)
                                                <i class="bi bi-star-fill active"></i>
                                            @endfor

                                            @for ($i = $rating; $i < 5; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>

                                        <div class="users">
                                            {{ $review }} Riviewers
                                        </div>
                                    </div>
                                </div>

                                <div class="wrap">
                                    @auth
                                        @if ($follow)
                                            <div class="for-follow">
                                                <form action="/cancel-follow-course" method="post">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ Auth::guard('web')->user()->id }}">
                                                    <button type="submit" class="cancel-follow">
                                                        <div class="text">
                                                            Berhenti Ikuti
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="for-follow">
                                                <form action="/follow-course" method="post">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ Auth::guard('web')->user()->id }}">
                                                    <button type="submit" class="follow">
                                                        <div class="text">
                                                            Ikuti Course
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif

                                        <div class="for-rate ulas-course" data-bs-toggle="modal" data-bs-target="#rating">
                                            <i class="bi bi-blockquote-right"></i>
                                        </div>
                                    @endauth
                                    @guest
                                        <div class="for-follow">
                                            <div type="submit" class="follow follow-course">
                                                <div class="text">
                                                    Ikuti Course
                                                </div>
                                            </div>
                                        </div>
                                    @endguest

                                </div>
                            </div>
                            @auth
                                @if ($totalJawaban !== 0)
                                    <div
                                        class="nilai
                             @if ($nilai < 60) low
                                @elseif ($nilai < 80) 
                                    medium                                    
                                @else
                                    high @endif">
                                        <div class="box-nilai">
                                            <div class="main-value">
                                                {{ $nilai }}
                                            </div>
                                            <div class="detail">
                                                <span> {{ $jawabanBenar }} </span> / <span> {{ $totalJawaban }}</span>
                                                quiz
                                            </div>
                                        </div>
                                        <div class="quote">
                                            @if ($nilai < 60)
                                                Jangan menyerah, Terus belajar & tingkatkan nilai!
                                            @elseif($nilai < 80)
                                                Kemajuan yang baik, Terus tingkatkan untuk nilai yang lebih tinggi!
                                            @else
                                                Hasilmu Luar biasa, Pertahankan semangat belajarmu!
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endauth
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
                    Pelajari materi & Kerjakan Quiz untuk mengembangkan pengetahuan!
                </div>
            </div>
            <div class="right">
                <div class="title-progress">Progress Kamu</div>
                @auth
                    <div class="progres">
                        <div class="progress" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: {{ $progress }}%;">
                            </div>
                        </div>
                        <div class="rate">{{ $progress }}%</div>
                    </div>
                @endauth
                @guest
                    <div class="progres">
                        <div class="progress" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 0%;">
                            </div>
                        </div>
                        <div class="rate">0%</div>
                    </div>
                @endguest
            </div>
        </div>

        <div class="content-course">
            <div class="learn">

                @foreach ($course->materi as $materi)
                    <div class="item">
                        <div class="for-info">
                            <div class="for-logo">
                                @if ($materi->tipe === 'Link')
                                    <i class="bi bi-link-45deg"></i>
                                @else
                                    <i class="bi bi-file-earmark-text"></i>
                                @endif
                            </div>
                            <div class="side">
                                <div class="name">
                                    {{ $materi->name }}
                                </div>
                                <div class="tanggal">
                                    {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>

                        @if ($materi->tipe === 'Link')
                            <a href="{{ $materi->value }}" target="_blank" class="action">
                                <div class="button">
                                    <i class="bi bi-play-fill"></i>
                                    <div class="txt">
                                        MULAI
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ asset('Uploads/for-materi/' . $materi->value) }}" target="_blank"
                                class="action">
                                <div class="button">
                                    <i class="bi bi-play-fill"></i>
                                    <div class="txt">
                                        MULAI
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                @endforeach

            </div>
            <div class="quiz">

                @auth
                    @foreach ($quizzes as $quiz)
                        @php
                            $hasAnswer = $quiz->answer->contains('user_id', Auth::guard('web')->user()->id);
                            $answer = \App\Models\Answer::where('user_id', Auth::guard('web')->user()->id)
                                ->where('quiz_id', $quiz->id)
                                ->first();
                        @endphp
                        <div class="item">
                            <div class="for-info">
                                <div class="for-logo">
                                    <i class="bi bi-question-lg"></i>
                                </div>
                                <div class="side">
                                    <div class="name">
                                        {{ $quiz->judul }}
                                    </div>
                                    @if ($answer && $answer->nilai)
                                        @if ($answer->nilai === 'Benar')
                                            <div class="status true">
                                                <i class="bi bi-check-circle"></i>
                                                <div class="txt">
                                                    Jawaban kamu Benar!
                                                </div>
                                            </div>
                                        @else
                                            <div class="status false">
                                                <i class="bi bi-x-circle"></i>
                                                <div class="txt">
                                                    Jawaban kamu Salah
                                                </div>
                                            </div>
                                        @endif
                                    @elseif ($answer)
                                        <div class="status done">
                                            <i class="bi bi-check2-circle"></i>
                                            <div class="txt">
                                                {{ $answer->status }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="status">
                                            <i class="bi bi-check2-circle"></i>
                                            <div class="txt">
                                                Belum Dikerjakan
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="action">

                                @if ($hasAnswer)
                                    <div class="done">
                                        <i class="bi bi-check-circle"></i>
                                        <div class="txt">
                                            DIKERJAKAN
                                        </div>
                                    </div>
                                @elseif ($follow && !$hasAnswer)
                                    <a href="/quiz/{{ $quiz->id }}" class="button">
                                        <i class="bi bi-cursor"></i>
                                        <div class="txt">
                                            KERJAKAN
                                        </div>
                                    </a>
                                @elseif (!$follow && !$hasAnswer)
                                    <div class="button lock">
                                        <i class="bi bi-lock"></i>
                                        <div class="txt">
                                            KERJAKAN
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endauth

                @guest
                    @foreach ($quizzes as $quiz)
                        <div class="item">
                            <div class="for-info">
                                <div class="for-logo">
                                    <i class="bi bi-question-lg"></i>
                                </div>
                                <div class="side">
                                    <div class="name">
                                        {{ $quiz->judul }}
                                    </div>

                                    <div class="status">
                                        <i class="bi bi-check2-circle"></i>
                                        <div class="txt">
                                            Belum Dikerjakan
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="action">
                                <div class="button lock">
                                    <i class="bi bi-lock"></i>
                                    <div class="txt">
                                        KERJAKAN
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endguest

            </div>
        </div>
    </section>

    <div class="information">
        <div class="for-img">
            <img src="{{ asset('Uploads/for-course_type/' . $course->type_course->gambar) }}">
        </div>

        <div class="wrap">
            <div class="top">
                <div class="name">
                    {{ $course->type_course->name_type }}
                </div>
                <div class="description">
                    {{ $course->type_course->deskripsi }}
                </div>
            </div>
            <div class="by">
                <span class="present">Present by</span>
                <span class="by-who">INTERMIND</span>
            </div>
        </div>
    </div>

    @auth
        {{-- Modal Tambah Ulasan --}}
        <div class="modal fade tambah-ulasan" id="rating" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-head">
                            <img src="{{ asset('property-img/logo.png') }}">
                        </div>

                        <div class="info">
                            <i class="bi bi-boxes"></i>
                            RATING & ULASAN
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="/post-ulasan" enctype="multipart/form-data" method="post">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="row">
                                <div class="col-12 rating">
                                    <label class="form-label">Rating</label>
                                    <div class="stars">
                                        <div class="star selected" data-value="1">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="star" data-value="2">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="star" data-value="3">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="star" data-value="4">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="star" data-value="5">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <input type="hidden" id="rating_value" name="rating" value="1">
                                    </div>
                                </div>
                                <div class="col-12 ulasan">
                                    <label class="form-label">Ulasan</label>
                                    <textarea name="ulasan" placeholder="Berikan ulasan anda..."></textarea>
                                </div>

                            </div>
                            <div class="for-submits">
                                <button type="submit" class="submits">
                                    <div class="txt">
                                        POSTING
                                    </div>
                                    <div class="for-icon-show">
                                        <i class="bi bi-plus-lg"></i>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Tambah Ulasan --}}
    @endauth

@endsection

@section('internal')

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

    <script>
        const followCourses = document.querySelectorAll('.follow-course');
        followCourses.forEach((course) => {
            // Tambahkan event listener untuk setiap elemen
            course.addEventListener('click', function() {
                // Tampilkan SweetAlert dengan data dari elemen yang diklik
                Swal.fire({
                    title: 'Pemberitahuan!',
                    text: 'Anda harus login terlebih dahulu untuk mengikuti course.',
                    imageUrl: '{{ asset('property-img/login.png') }}',
                    imageWidth: 250,
                    imageHeight: 200,
                    imageAlt: 'Gambar Course',
                    showConfirmButton: false,

                    customClass: {
                        popup: 'alert-login', // Tambahkan kelas khusus
                    },
                });
            });
        });

        const lihatCourses = document.querySelectorAll('.button.lock');
        lihatCourses.forEach((course) => {
            course.addEventListener('click', function() {
                Swal.fire({
                    title: 'Pemberitahuan!',
                    text: 'Anda harus mengikuti course terlebih dahulu untuk megakses Quiz.',
                    imageUrl: '{{ asset('property-img/login.png') }}',
                    imageWidth: 250,
                    imageHeight: 200,
                    imageAlt: 'Gambar Course',
                    showConfirmButton: false,

                    customClass: {
                        popup: 'alert-login',
                    },
                });
            });
        });
    </script>

    <script>
        // Ambil semua elemen bintang
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating_value');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value')); // Ambil nilai data-value

                // Tambahkan class 'selected' ke bintang yang diklik dan semua yang di sebelah kiri
                stars.forEach(s => {
                    const starValue = parseInt(s.getAttribute('data-value'));
                    if (starValue <= value) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });

                // Masukkan nilai ke input hidden
                ratingInput.value = value;
            });
        });
    </script>



    <script>
        document.getElementById('reg-pelajar').addEventListener('click', function() {
            document.getElementById('reg-pelajar').classList.add('active');
            document.getElementById('form-pelajar').classList.add('active');

            document.getElementById('reg-guru').classList.remove('active');
            document.getElementById('form-guru').classList.remove('active');
            document.getElementById('imgu-reg').src = "{{ asset('property-img/student-light.png') }}";
            document.getElementById('imgg-reg').src = "{{ asset('property-img/teacher-dark.png') }}";

        });

        document.getElementById('reg-guru').addEventListener('click', function() {
            document.getElementById('reg-guru').classList.add('active');
            document.getElementById('form-guru').classList.add('active');

            document.getElementById('reg-pelajar').classList.remove('active');
            document.getElementById('form-pelajar').classList.remove('active');
            document.getElementById('imgu-reg').src = "{{ asset('property-img/student-dark.png') }}";
            document.getElementById('imgg-reg').src = "{{ asset('property-img/teacher-light.png') }}";

        });
    </script>
    <script>
        document.getElementById('pelajar').addEventListener('click', function() {
            document.getElementById('pelajar').classList.add('active');
            document.getElementById('formulir-pelajar').classList.add('active');

            document.getElementById('guru').classList.remove('active');
            document.getElementById('formulir-guru').classList.remove('active');
            document.getElementById('imgu-login').src = "{{ asset('property-img/student-light.png') }}";
            document.getElementById('imgg-login').src = "{{ asset('property-img/teacher-dark.png') }}";

        });

        document.getElementById('guru').addEventListener('click', function() {
            document.getElementById('guru').classList.add('active');
            document.getElementById('formulir-guru').classList.add('active');

            document.getElementById('pelajar').classList.remove('active');
            document.getElementById('formulir-pelajar').classList.remove('active');
            document.getElementById('imgu-login').src = "{{ asset('property-img/student-dark.png') }}";
            document.getElementById('imgg-login').src = "{{ asset('property-img/teacher-light.png') }}";

        });
    </script>
    <script>
        document.querySelectorAll('.toggles').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                // Cari input yang ada di elemen "form-group" yang sama
                var input = toggle.closest('form').querySelector('.target');

                // Ubah tipe input antara "password" dan "text"
                if (input.type === 'password') {
                    input.type = 'text';
                    toggle.innerHTML = `
        <i class="bi bi-eye"></i>
        `;
                } else {
                    input.type = 'password';
                    toggle.innerHTML = `
        <i class="bi bi-eye-slash"></i>
        `;
                }
            });
        });
    </script>
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
