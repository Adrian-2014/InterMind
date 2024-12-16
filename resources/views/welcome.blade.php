@extends('layout.main')

@section('title', 'Home')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

{{-- for navbar --}}
@section('home', '#')
@section('about', '#about-link')
{{-- for navbar --}}

@section('content')
    <!-- Navbar -->
    @include('layout.navbar')
    <!-- Navbar -->

    <section class="landing">
        <div class="left">
            <div class="top">
                <div class="bigs">
                    Dapatkan Kemungkinan <span>Tak Terbatas </span> untuk Belajar!
                </div>
                <div class="small">
                    "Langkah pertama perjalanmu menuju pengetahuan tanpa batas dimulai di sini. Jelajahi kursus, pelajari
                    hal baru, dan temukan inspirasi untuk mencapai lebih dari yang kamu bayangkan".
                </div>
            </div>

            <div class="bottom">
                <a href="#course-link">
                    <div class="start">
                        Temukan Course
                    </div>
                    <div class="for-icon">
                        <i class="bi bi-chevron-compact-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="right">
            <div class="background">
                <img src="{{ asset('property-img/bg.png') }}">
            </div>
            <div class="img-content">
                <img src="{{ asset('property-img/model.png') }}">
            </div>

            {{-- properti --}}

            <div class="user-wrap">
                <div class="images">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="content">
                    <div class="top">
                        14K
                    </div>
                    <div class="bottom">
                        Pelajar Aktif
                    </div>
                </div>
            </div>


            <div class="trophy-wrap">
                <div class="images">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <div class="content">
                    <div class="top">
                        17
                    </div>
                    <div class="bottom">
                        Penghargaan internasional
                    </div>
                </div>

                {{-- <i class="bi bi-award-fill"></i> --}}
            </div>

            <div class="shapes">
                <div class="lengkung">
                    <img src="{{ asset('property-img/line.png') }}">
                </div>
                <div class="cabang">
                    <img src="{{ asset('property-img/lines.png') }}">
                </div>
                <div class="award">
                    <i class="bi bi-award"></i>
                </div>
                <div class="books">
                    <i class="bi bi-bookmark-heart"></i>
                </div>
            </div>

            {{-- properti --}}
        </div>
    </section>

    <div id="course-link"></div>

    <section class="course">
        <div class="context">
            Explore Course
        </div>
        <div class="title">
            <div class="rows">
                @foreach ($courseList as $course)
                    <div class="item">
                        <div class="course-type">
                            {{ $course->type_course->name_type }}
                        </div>
                        <div class="main-item">
                            <div class="img-content">
                                <img src="{{ asset('Uploads/for-course/' . $course->gambar) }}">

                                <div class="secret">
                                    <div class="publisher">
                                        <span>Published by: </span>
                                        {{ $course->teacher->name }}
                                    </div>
                                    <div class="tahun">
                                        {{ \Carbon\Carbon::parse($course->created_at)->translatedFormat('Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="core">
                                <div class="first">
                                    <div class="judul">
                                        {{ $course->name }}
                                    </div>
                                    <div class="descript">
                                        {{ Str::limit($course->deskripsi, 75, '...') }}
                                    </div>
                                </div>
                                @auth
                                    <a href="/course/{{ $course->id }}" class="lihat">
                                        Lihat Course <i class="bi bi-chevron-compact-right"></i>
                                    </a>
                                @endauth
                                @guest
                                    <div class="lihat lihat-course">
                                        Lihat Course <i class="bi bi-chevron-compact-right"></i>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>

    <div id="about-link">

    </div>

    <section class="about">

        <div class="about-first">
            <div class="left">
                <div class="top">
                    <div class="context">
                        Segalanya Tentang Kami
                    </div>
                    <div class="title">
                        Upgrade kemampuanmu, Latih Skillmu, dan Lampaui semua <span>Batasanmu</span>.
                    </div>
                </div>
                <div class="bottom">

                    <div class="splide" role="group" id="splide-comment">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($ulasans as $ulasan)
                                    <li class="splide__slide">
                                        <div class="star">
                                            @for ($i = 0; $i < $ulasan->rating; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                            @for ($i = $ulasan->rating; $i < 5; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                        <div class="comment">
                                            <div class="for-quote">
                                                <img src="{{ asset('property-img/quote.png') }}">
                                            </div>
                                            <div class="for-message">
                                                {{ $ulasan->ulasan }}
                                            </div>
                                        </div>
                                        <div class="user-data">
                                            <div class="for-prof">
                                                @if ($ulasan->user->profil)
                                                    <img src="{{ asset('Uploads/for-profil/' . $ulasan->user->profil) }}">
                                                @else
                                                    <img src="{{ asset('property-img/profile.jpg') }}">
                                                @endif
                                            </div>
                                            <div class="data">
                                                <div class="name">
                                                    {{ $ulasan->user->name }}
                                                </div>
                                                <div class="role">
                                                    Pelajar
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tanggal">
                                            <span>Diposting pada </span>
                                            {{ \Carbon\Carbon::parse($ulasan->created_at)->translatedFormat('j F Y') }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right">
                <div class="contain st">
                    <div class="for-isi">
                        <div class="icon">
                            <img src="{{ asset('property-img/user.png') }}">
                        </div>
                        <div class="text">
                            14K+
                        </div>
                        <div class="detail">
                            User aktif Pertahun
                        </div>
                    </div>

                    <div class="for-img">
                        <img src="{{ asset('property-img/model about 1.jpeg') }}">
                    </div>
                </div>
                <div class="contain nd">
                    <div class="for-img">
                        <img src="{{ asset('property-img/model about 2.jpeg') }}">
                    </div>

                    <div class="for-isi">
                        <div class="icon">
                            <img src="{{ asset('property-img/book.png') }}">
                        </div>
                        <div class="text">
                            30+
                        </div>
                        <div class="detail">
                            Course dengan berbagai Tema.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-sec">
            {{-- <div class="main-title">
                Selalu menyediakan yang Terbaik untukmu
            </div> --}}
            <div class="sec-list">
                <div class="item andalan">
                    <div class="for-icon">
                        <i class='bx bx-bookmarks'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Andalan Pelajar
                        </div>
                        <div class="desc">
                            Pilihan utama pelajar untuk meraih potensi terbaik mereka di seluruh dunia.
                        </div>
                    </div>
                </div>
                <div class="item komunitas">
                    <div class="for-icon">
                        <i class='bx bx-network-chart'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Relasi & Network
                        </div>
                        <div class="desc">
                            Komunitas antar pelajar dari berbagai bidang yang Interaktif & Supportif.
                        </div>
                    </div>
                </div>
                <div class="item prestasi">
                    <div class="for-icon">
                        <i class='bx bx-medal'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Prestasi
                        </div>
                        <div class="desc">
                            Website E-Learning Terbesar di Seluruh dunia.
                        </div>
                    </div>
                </div>
                <div class="item dunia">
                    <div class="for-icon">
                        <i class='bx bx-world'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Akses Global
                        </div>
                        <div class="desc">
                            Membuka peluang bagi pelajar di seluruh dunia untuk mengembangkan pengetahuan
                            mereka.
                        </div>
                    </div>
                </div>
                <div class="item rating">
                    <div class="for-icon">
                        <i class='bx bx-star'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Rating
                        </div>
                        <div class="desc">
                            Mendapat Ulasan positif dari ratusan Guru & Pelajar.
                        </div>
                    </div>
                </div>
                <div class="item target">
                    <div class="for-icon">
                        <i class='bx bx-target-lock'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Tujuan Terarah
                        </div>
                        <div class="desc">
                            Membantu setiap pelajar mencapai tujuan dan target mereka.
                        </div>
                    </div>
                </div>
                <div class="item time">
                    <div class="for-icon">
                        <i class='bx bx-timer'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Efisiensi Waktu
                        </div>
                        <div class="desc">
                            Membantumu mempelajari sesuatu dengan lebih cepat dengan berbagai metode unik.
                        </div>
                    </div>
                </div>
                <div class="item variasi">
                    <div class="for-icon">
                        <i class='bx bx-collection'></i>
                    </div>
                    <div class="main">
                        <div class="title">
                            Variasi
                        </div>
                        <div class="desc">
                            Berbagai Course dengan metode belajar yang beragam.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    @include('layout.footer')
    <!-- Footer -->
@endsection


@section('internal')

    <script>
        var splide = new Splide('#splide-comment', {
            type: 'loop',
            arrows: false,
        });

        splide.mount();

        const lihatCourses = document.querySelectorAll('.lihat-course');
        lihatCourses.forEach((course) => {
            // Tambahkan event listener untuk setiap elemen
            course.addEventListener('click', function() {
                // Tampilkan SweetAlert dengan data dari elemen yang diklik
                Swal.fire({
                    title: 'Pemberitahuan!',
                    text: 'Anda harus login terlebih dahulu untuk mengakses course.',
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
