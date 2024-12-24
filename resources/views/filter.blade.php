@extends('layout.main')

@section('title', 'List Course')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/filter.css') }}">
@endsection

{{-- for navbar --}}
@section('home', '/')
@section('about', '/#about-link')
{{-- for navbar --}}

@section('content')
    <!-- Navbar -->
    @include('layout.navbar')
    <!-- Navbar -->

    <div class="head">
        <div class="show">
            <div class="txt">
                List Course:
            </div>
            <div class="value">
                {{ $typeTarget->name_type }}
            </div>
        </div>

        <div class="search">
            <i class="bi bi-search"></i>
            <input type="search" id="searchInput" placeholder="Cari Course..">
        </div>
    </div>
    <section class="course">
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
            @forelse ($courseList as $course)
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

                            Tidak ada Course dengan tipe {{ $typeTarget->name_type }} saat ini!
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
