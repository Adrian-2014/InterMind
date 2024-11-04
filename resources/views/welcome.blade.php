@extends('layout.main')

@section('title', 'Home')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

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
                <a href="">
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

    <section class="course">
        <div class="rows">

            <div class="item">
                <div class="course-type">
                    Sains
                </div>
                <div class="main-item">
                    <div class="img-content">
                        <img src="{{ asset('property-img/astronomy-example.jpg') }}">

                        <div class="secret">
                            <div class="publisher">
                                <span>Published by: </span>
                                Adrian Kurniawan
                            </div>
                            <div class="tahun">
                                2024
                            </div>
                        </div>
                    </div>
                    <div class="core">
                        <div class="first">
                            <div class="judul">
                                Ekosistem Tata Surya
                            </div>
                            <div class="descript">
                                Mempelajari berbgai ekosistem dari planet planet di tata surya.
                            </div>
                        </div>
                        <div class="lihat">
                            Lihat Course <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="course-type">
                    PERSONALITY
                </div>
                <div class="main-item">
                    <div class="img-content">
                        <img src="{{ asset('property-img/i hate people.jpeg') }}">

                        <div class="secret">
                            <div class="publisher">
                                <span>Published by: </span>
                                Rudi escobar
                            </div>
                            <div class="tahun">
                                2024
                            </div>
                        </div>
                    </div>
                    <div class="core">
                        <div class="first">
                            <div class="judul">
                                Ekosistem Tata Surya
                            </div>
                            <div class="descript">
                                Mempelajari berbgai ekosistem dari planet planet di tata surya.
                            </div>
                        </div>
                        <div class="lihat">
                            Lihat Course <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="course-type">
                    MEME
                </div>
                <div class="main-item">
                    <div class="img-content">
                        <img src="{{ asset('property-img/sesat sesat.jpeg') }}">

                        <div class="secret">
                            <div class="publisher">
                                <span>Published by: </span>
                                Patrick star
                            </div>
                            <div class="tahun">
                                2012
                            </div>
                        </div>
                    </div>
                    <div class="core">
                        <div class="first">
                            <div class="judul">
                                Mari berbenah sejenak
                            </div>
                            <div class="descript">
                                Stiker patrick gabut
                            </div>
                        </div>
                        <div class="lihat">
                            Lihat Course <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="course-type">
                    ARABIC LANGUAGE
                </div>
                <div class="main-item">
                    <div class="img-content">
                        <img src="{{ asset('property-img/qo iso.jpeg') }}">

                        <div class="secret">
                            <div class="publisher">
                                <span>Published by: </span>
                                zainal abidin
                            </div>
                            <div class="tahun">
                                2022
                            </div>
                        </div>
                    </div>
                    <div class="core">
                        <div class="first">
                            <div class="judul">
                                LATIHAN BAHASA ARAB
                            </div>
                            <div class="descript">
                                Mempelajari huruf hijaiyah.
                            </div>
                        </div>
                        <div class="lihat">
                            Lihat Course <i class="bi bi-chevron-compact-right"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="about">
        <div class="feats">
            {{-- <div class="top-head">
                PRESTASI KAMI
            </div> --}}
            <div class="item-feats">
                <div class="list">
                    <div class="for-icon">
                        <img src="{{ asset('icon/success.png') }}">
                    </div>
                    <div class="for-txt">
                        Lebih dari 2500 Pelajar Berprestasi.
                    </div>
                </div>
                <div class="list">
                    <div class="for-icon">
                        <img src="{{ asset('icon/community.png') }}">
                    </div>
                    <div class="for-txt">
                        Komunitas & Relasi.
                    </div>
                </div>
                <div class="list">
                    <div class="for-icon">
                        <img src="{{ asset('icon/award.png') }}">
                    </div>
                    <div class="for-txt">
                        Penghargaan tingkat Internasional.
                    </div>
                </div>
                <div class="list">
                    <div class="for-icon">
                        <img src="{{ asset('icon/relationship.png') }}">
                    </div>
                    <div class="for-txt">
                        kerjasama & Kemitraan.
                    </div>
                </div>
                <div class="list">
                    <div class="for-icon">
                        <img src="{{ asset('icon/atom.png') }}">
                    </div>
                    <div class="for-txt">
                        Berbagai macam Disiplin Ilmu.
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
        document.getElementById('reg-pelajar').addEventListener('click', function() {
            document.getElementById('reg-pelajar').classList.add('active');
            document.getElementById('form-pelajar').classList.add('active');

            document.getElementById('reg-guru').classList.remove('active');
            document.getElementById('form-guru').classList.remove('active');

        });

        document.getElementById('reg-guru').addEventListener('click', function() {
            document.getElementById('reg-guru').classList.add('active');
            document.getElementById('form-guru').classList.add('active');

            document.getElementById('reg-pelajar').classList.remove('active');
            document.getElementById('form-pelajar').classList.remove('active');

        });
    </script>
    <script>
        document.getElementById('pelajar').addEventListener('click', function() {
            document.getElementById('pelajar').classList.add('active');
            document.getElementById('formulir-pelajar').classList.add('active');

            document.getElementById('guru').classList.remove('active');
            document.getElementById('formulir-guru').classList.remove('active');

        });

        document.getElementById('guru').addEventListener('click', function() {
            document.getElementById('guru').classList.add('active');
            document.getElementById('formulir-guru').classList.add('active');

            document.getElementById('pelajar').classList.remove('active');
            document.getElementById('formulir-pelajar').classList.remove('active');

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
