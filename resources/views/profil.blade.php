@extends('layout.main')

@section('title', 'Profil')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endsection

{{-- for navbar --}}
@section('home', '/')
@section('about', '/#about-link')
{{-- for navbar --}}

@section('content')
    <!-- Navbar -->
    @include('layout.navbar')
    <!-- Navbar -->

    <section class="profil-section">
        <div class="info-user">
            <div class="for-img">

                @if (!is_null(Auth::guard('web')->user()->profil))
                    <img src="{{ asset('Uploads/for-profil/' . Auth::guard('web')->user()->profil) }}">
                @else
                    <img src="{{ asset('property-img/profile.jpg') }}">
                @endif
            </div>

            <div class="for-detail">
                <div class="username">
                    {{ Auth::guard('web')->user()->name }}
                </div>
                <div class="useremail">
                    {{ Auth::guard('web')->user()->email }}
                </div>
            </div>
        </div>
        <div class="course-user">
            <div
                class="list-user @if ($countMyQuiz === 0) box-0
                        @elseif ($countMyQuiz < 25)
                           box-25
                        @elseif ($countMyQuiz < 50)
                          box-50
                        @elseif ($countMyQuiz >= 50)
                           box-more @endif">
                <div class="for-icon">
                    @if ($countMyQuiz === 0)
                        <i class="bi bi-award for-0"></i>
                    @elseif ($countMyQuiz < 25)
                        <i class="bi bi-award for-25"></i>
                    @elseif ($countMyQuiz < 50)
                        <i class="bi bi-award for-50"></i>
                    @elseif ($countMyQuiz >= 50)
                        <i class="bi bi-award for-more"></i>
                    @endif
                </div>

                <div class="for-text">
                    <div class="title">
                        Quiz
                    </div>
                    <div class="description">
                        @if ($countMyQuiz === 0)
                            Kamu belum mengerjakan quiz apapun. Yuk mulai sekarang dan lihat sejauh mana kamu bisa
                            melangkah!
                        @elseif ($countMyQuiz < 25)
                            Kamu telah menyelesaikan <span class="des-25">{{ $countMyQuiz }}</span> quiz! Awal yang baik,
                            terus semangat
                            dan tingkatkan pencapaianmu!
                        @elseif ($countMyQuiz < 50)
                            Hebat! Kamu telah menyelesaikan <span class="des-50">{{ $countMyQuiz }}</span> quiz! Jangan
                            berhenti di sini,
                            tantang dirimu lebih jauh!
                        @elseif ($countMyQuiz >= 50)
                            Luar biasa! Kamu telah menyelesaikan <span class="des-more">{{ $countMyQuiz }}</span> quiz!
                            Dedikasimu patut
                            diacungi jempol!
                        @endif
                    </div>
                </div>
            </div>
            <div
                class="list-user @if ($countMyCourse === 0) box-0
                        @elseif ($countMyCourse < 10)
                           box-25
                        @elseif ($countMyCourse < 20)
                          box-50
                        @elseif ($countMyCourse >= 35)
                           box-more @endif">
                <div class="for-icon">
                    @if ($countMyCourse === 0)
                        <i class="bi bi-bookmark-heart for-0"></i>
                    @elseif ($countMyCourse < 10)
                        <i class="bi bi-bookmark-heart for-25"></i>
                    @elseif ($countMyCourse < 20)
                        <i class="bi bi-bookmark-heart for-50"></i>
                    @elseif ($countMyCourse >= 35)
                        <i class="bi bi-bookmark-heart for-more"></i>
                    @endif
                </div>

                <div class="for-text">
                    <div class="title">
                        Course
                    </div>
                    <div class="description">
                        @if ($countMyCourse === 0)
                            Kamu belum mengikuti course apapun. Yuk mulai belajar dan tambah wawasanmu sekarang!
                        @elseif ($countMyCourse < 5)
                            Kamu telah mengikuti <span class="des-25">{{ $countMyCourse }}</span> course. Awal yang baik,
                            teruslah belajar
                            dan gali lebih banyak ilmu!
                        @elseif ($countMyCourse < 20)
                            Hebat! Kamu sudah mengikuti <span class="des-50">{{ $countMyCourse }}</span> course. Tingkatkan
                            usahamu untuk
                            menjadi lebih ahli!
                        @elseif ($countMyCourse >= 35)
                            Luar biasa! Kamu telah mengikuti <span class="des-more">{{ $countMyCourse }}</span> course.
                            Perjalanan belajarmu
                            sangat inspiratif!
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-section">
        <div class="head">
            <div class="context">
                <i class="bi bi-bookmark-heart"></i>
                <div class="txt">
                    Course yang Kamu Ikuti
                </div>
            </div>
            <div class="search">
                <i class="bi bi-search"></i>
                <input type="search" id="searchInput" placeholder="Cari Course..">
            </div>
        </div>

        <div class="title">
            <div class="blank d-none" id="noResults">
                <div class="img-blank">
                    <img src="{{ asset('property-img/no-results.png') }}">
                </div>
                <div class="txt-result">
                    <div class="title">
                        Whoops!
                    </div>
                    <div class="result">
                        Tidak ada course yang sesuai dengan bilah pencarian, Harap memasukkan kata kunci yang benar!
                    </div>
                </div>
            </div>
            <div class="rows" id="courseRows">
                @forelse ($myCourse as $course)
                    <div class="item" data-title="{{ strtolower($course->name) }}"
                        data-description="{{ strtolower($course->deskripsi) }}">
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
                                        Lanjutkan Belajar<i class="bi bi-chevron-compact-right"></i>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="blanks">
                        <div class="img-blank">
                            <img src="{{ asset('property-img/nothing.png') }}">
                        </div>
                        <div class="txt-result">
                            <div class="title">
                                Whoops!
                            </div>
                            <div class="result">
                                Kamu Belum mengikuti Course apapun saat ini!
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
    </section>


    <!-- Footer -->
    @include('layout.footer')
    <!-- Footer -->
@endsection


@section('internal')

    <script>
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

        document.addEventListener("DOMContentLoaded", () => {
            const searchInput = document.getElementById('searchInput');
            const courseItems = document.querySelectorAll('#courseRows .item');
            const noResults = document.getElementById('noResults');

            searchInput.addEventListener('input', () => {
                const searchText = searchInput.value.toLowerCase();
                let hasVisibleItems = false;

                courseItems.forEach(item => {
                    const title = item.getAttribute('data-title');
                    const description = item.getAttribute('data-description');
                    if (title.includes(searchText) || description.includes(searchText)) {
                        item.classList.remove('d-none');
                        hasVisibleItems = true;
                    } else {
                        item.classList.add('d-none');
                    }
                });

                // Tampilkan atau sembunyikan "no results" menggunakan class d-none
                if (hasVisibleItems) {
                    noResults.classList.add('d-none');
                } else {
                    noResults.classList.remove('d-none');
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
