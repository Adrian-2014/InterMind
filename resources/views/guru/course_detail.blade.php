@extends('guru.layout.main')

@section('title', 'Course Detail - Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/guru/course_detail.css') }}">

@endsection

@section('sub-menu')
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="#" class="menu-link">
                <div data-i18n="Without menu">Detail Course</div>
            </a>
        </li>
    </ul>
@endsection
@section('sub-stat', 'open')
@section('id', $course->id)

@section('content')

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            @include('guru.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">

                @include('guru.layout.nav')

                <div class="content-wrapper">
                    <div class="row course-detail">

                        {{-- Section Start --}}

                        <div class="col-12">

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
                                                <div class="for-name">
                                                    {{ $course->name }}
                                                </div>

                                                <div class="for-deskripsi">
                                                    {{ $course->deskripsi }}
                                                </div>

                                                <div class="for-type">
                                                    <div class="txt">
                                                        Tipe Course:
                                                    </div>
                                                    <div class="value">
                                                        {{ $course->type_course->name_type }}
                                                    </div>
                                                </div>

                                                <div class="for-follow">
                                                    <div class="txt">
                                                        Pengikut:
                                                    </div>
                                                    <div class="value">
                                                        <div class="stars">
                                                            <i class="bi bi-heart-fill"></i>
                                                        </div>

                                                        <div class="users">
                                                            {{ $follower }} Pengikut
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="for-rating">
                                                    <div class="txt">
                                                        Rating:
                                                    </div>
                                                    <div class="value">
                                                        <div class="stars">
                                                            @for ($i = 0; $i < $rating; $i++)
                                                                <i class="bi bi-star-fill"></i>
                                                            @endfor

                                                            @for ($i = $rating; $i < 5; $i++)
                                                                <i class="bi bi-star"></i>
                                                            @endfor
                                                        </div>

                                                        <div class="users">
                                                            {{ $review }} Riviewers
                                                        </div>
                                                    </div>
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
                                    <div class="sub-head left">
                                        <div class="big">
                                            <div class="title">
                                                Materi
                                            </div>
                                            <div class="sub-title">
                                                Buat materi untuk dipelajari bersama sama!
                                            </div>
                                        </div>
                                        <div class="add materi" data-bs-toggle="modal" data-bs-target="#add-matter">
                                            <i class="bi bi-plus-lg"></i>
                                        </div>
                                    </div>
                                    <div class="sub-head right">
                                        <div class="big">
                                            <div class="title">
                                                Kuis
                                            </div>
                                            <div class="sub-title">
                                                Buat latihan soal untuk menguji kemampuan pelajar!
                                            </div>
                                        </div>
                                        <div class="add kuis" data-bs-toggle="modal" data-bs-target="#add-quiz">
                                            <i class="bi bi-plus-lg"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-course">
                                    <div class="lists learn">
                                        @foreach ($materies as $materi)
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

                                                <div class="action">

                                                    @if ($materi->tipe === 'Link')
                                                        <a href="{{ $materi->value }}" class="act play" target="_blank">
                                                            <i class="bi bi-play-fill"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ asset('Uploads/for-materi/' . $materi->value) }}"
                                                            class="act play" target="_blank">
                                                            <i class="bi bi-play-fill"></i>
                                                        </a>
                                                    @endif

                                                    <div class="act edit"
                                                        data-bs-target="#update-materi-{{ $materi->id }}"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </div>

                                                    <div class="act hapus hapus-materi" data-id="{{ $materi->id }}">
                                                        <i class="bi bi-trash3"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="lists quiz">

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
                                                        <div class="tanggal">
                                                            {{ \Carbon\Carbon::parse($quiz->created_at)->translatedFormat('d F Y') }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="action">

                                                    <div class="act edit" data-bs-target="#edit-quiz-{{ $quiz->id }}"
                                                        data-bs-toggle="modal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </div>

                                                    <div class="act hapus hapus-quiz" data-id="{{ $quiz->id }}">
                                                        <i class="bi bi-trash3"></i>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
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
                        </div>
                    </div>
                </div>

            </div>
            {{-- Layout Page --}}
        </div>
    </div>

    {{-- Modal Tambah Materi --}}
    <div class="modal fade tambah-materi" id="add-matter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>

                    <div class="info">
                        <i class="bi bi-boxes"></i>
                        TAMBAH MATERI
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/add-materi" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row damn">
                            <div class="col-12" x-data="{ tipe_materi: '' }">
                                <div class ="row">
                                    <div class="col-12">
                                        <div class="form-label">Judul Materi</div>
                                        <input autocomplete="off" type="text" name="name" class="form-control"
                                            required placeholder="judul materi / pembelajaran.." maxlength="35">

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    </div>
                                    <div class="col-12 drop">
                                        <label class="form-label">Tipe Course</label>
                                        <div class="special">
                                            <input autocomplete="off" type="text" class="form-control" required
                                                readonly x-model="tipe_materi" name="type"
                                                placeholder="pilih tipe yang sesuai..">
                                            <div class="dropdown">
                                                <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="bi bi-caret-down-fill"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <div class="item choice-link" @click="tipe_materi = 'Link'">
                                                        <div class="for-icon">
                                                            <i class="bi bi-link-45deg"></i>
                                                        </div>
                                                        <div class="for-text">
                                                            Link
                                                        </div>
                                                    </div>
                                                    <div class="item choice-link" @click="tipe_materi = 'Dokumen'">
                                                        <div class="for-icon">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </div>
                                                        <div class="for-text">
                                                            Dokumen
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 link">
                                        <label class="form-label">Link</label>
                                        <div class="val">
                                            <div class="for-icon">
                                                <i class="bi bi-link-45deg"></i>
                                            </div>
                                            <input autocomplete="off" type="text" name="link"
                                                class="form-control input-link" placeholder="paste link dari internet"
                                                required disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 sparatis"></div>
                                    <div class="col-12 doc">
                                        <label class="form-label">Document <span>(word / pdf / powerpoint)</span></label>
                                        <input autocomplete="off" type="file" name="document"
                                            accept=".doc,.docx,.pdf,.ppt,.pptx" class="form-control input-doc" required
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="for-submits">
                            <button type="submit" class="submits">
                                <div class="txt">
                                    TAMBAH
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
    {{-- Modal Tambah Materi --}}

    {{-- Modal Tambah Quiz --}}
    <div class="modal fade tambah-quiz" id="add-quiz" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>

                    <div class="info">
                        <i class="bi bi-boxes"></i>
                        TAMBAH QUIZ
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/add-quiz" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row damn">
                            <div class="col-12">
                                <div class ="row">
                                    <div class="col-12">
                                        <div class="form-label">Judul Quiz</div>
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="text" class="form-control" name="judul"
                                            placeholder="quiz bab 1.." maxlength="35" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class ="row">
                                    <div class="col-12">
                                        <div class="form-label">pertanyaan</div>
                                        <textarea class="area-quiz" name="pertanyaan" placeholder="masukkan pertanyaan.." maxlength="500" required></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Sertakan gambar (opsional)</label>
                                        <input type="file" class="form-control" name="gambar"
                                            accept="image/png, image/jpg, image/jpeg, image/webp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="for-submits">
                            <button type="submit" class="submits">
                                <div class="txt">
                                    TAMBAH
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
    {{-- Modal Tambah Quiz --}}


    {{-- Modal Edit Materi --}}
    @foreach ($materies as $materi)
        <div class="modal fade edit-materi" id="update-materi-{{ $materi->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-head">
                            <img src="{{ asset('property-img/logo.png') }}">
                        </div>

                        <div class="info">
                            <i class="bi bi-boxes"></i>
                            EDIT DATA
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="/update-materi" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row damn">
                                <div class="col-12" x-data="{ tipe_materi: '{{ $materi->tipe }}' }">
                                    <div class ="row">
                                        <div class="col-12">
                                            <div class="form-label">Judul Materi</div>
                                            <input autocomplete="off" type="text" name="name" class="form-control"
                                                value="{{ $materi->name }}" required maxlength="35"
                                                placeholder="judul materi / pembelajaran..">

                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="hidden" name="id" value="{{ $materi->id }}">
                                        </div>
                                        <div class="col-12 drop">
                                            <label class="form-label">Tipe Course</label>
                                            <div class="special">
                                                <input autocomplete="off" type="text" class="form-control" required
                                                    readonly x-model="tipe_materi" name="type"
                                                    placeholder="pilih tipe yang sesuai..">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                                        <i class="bi bi-caret-down-fill"></i>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <div class="item choice-link" @click="tipe_materi = 'Link'">
                                                            <div class="for-icon">
                                                                <i class="bi bi-link-45deg"></i>
                                                            </div>
                                                            <div class="for-text">
                                                                Link
                                                            </div>
                                                        </div>
                                                        <div class="item choice-link" @click="tipe_materi = 'Dokumen'">
                                                            <div class="for-icon">
                                                                <i class="bi bi-file-earmark-text"></i>
                                                            </div>
                                                            <div class="for-text">
                                                                Dokumen
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 link">
                                            <label class="form-label">Link</label>
                                            <div class="val">
                                                <div class="for-icon">
                                                    <i class="bi bi-link-45deg"></i>
                                                </div>
                                                <input autocomplete="off" type="text" name="link"
                                                    class="form-control input-link" placeholder="paste link dari internet"
                                                    @if ($materi->tipe === 'Dokumen') disabled @elseif($materi->tipe === 'Link') value="{{ $materi->value }}" @endif>
                                            </div>
                                        </div>
                                        <div class="col-12 sparatis"></div>
                                        <div class="col-12 doc">
                                            <label class="form-label">Document <span>(word / pdf /
                                                    powerpoint)</span></label>
                                            <input autocomplete="off" type="file" name="document"
                                                accept=".doc,.docx,.pdf,.ppt,.pptx" class="form-control input-doc"
                                                @if ($materi->tipe === 'Link') disabled @elseif($materi->tipe === 'Dokumen') value="{{ $materi->value }}" @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="for-submits">
                                <button type="submit" class="submits">
                                    <div class="txt">
                                        UPDATE
                                    </div>
                                    <div class="for-icon-show">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal Edit Materi --}}

    {{-- Modal Edit Quiz --}}
    @foreach ($quizzes as $quiz)
        <div class="modal fade edit-quiz" id="edit-quiz-{{ $quiz->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-head">
                            <img src="{{ asset('property-img/logo.png') }}">
                        </div>

                        <div class="info">
                            <i class="bi bi-boxes"></i>
                            EDIT DATA
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="/update-quiz" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row damn">
                                <div class="col-12">
                                    <div class ="row">
                                        <div class="col-12">
                                            <label class="form-label">Judul Quiz</label>
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="hidden" name="id" value="{{ $quiz->id }}">
                                            <input type="text" class="form-control" name="judul"
                                                value="{{ $quiz->judul }}" placeholder="quiz bab 1.." maxlength="35"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class ="row">
                                        <div class="col-12">
                                            <label class="form-label">Pertanyaan</label>
                                            <textarea class="area-quiz" name="pertanyaan" placeholder="masukkan pertanyaan.." maxlength="500" required>{{ $quiz->pertanyaan }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Sertakan gambar (opsional)</label>
                                            <input type="file" class="form-control" name="gambar"
                                                accept="image/png, image/jpg, image/jpeg, image/webp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="for-submits">
                                <button type="submit" class="submits">
                                    <div class="txt">
                                        UPDATE
                                    </div>
                                    <div class="for-icon-show">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal Edit Quiz --}}

@endsection


@section('internal')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Loop through each row that has the class 'damn'
            document.querySelectorAll(".damn").forEach(row => {
                // Select relevant elements inside this row
                const dropdownItems = row.querySelectorAll(".choice-link");
                const inputLink = row.querySelector(".input-link[name='link']");
                const inputDocument = row.querySelector(".input-doc[name='document']");

                // Function to handle dropdown selection
                dropdownItems.forEach(item => {
                    item.addEventListener("click", () => {
                        const selectedType = item.textContent
                            .trim(); // Get the selected text

                        // Clear values in both inputs
                        inputLink.value = "";
                        inputDocument.value = "";

                        if (selectedType === "Link") {
                            // Enable and require the Link input, disable the Document input
                            inputLink.removeAttribute("disabled");
                            inputLink.setAttribute("required", "required");
                            inputDocument.setAttribute("disabled", "disabled");
                            inputDocument.removeAttribute("required");
                        } else if (selectedType === "Dokumen") {
                            // Enable and require the Document input, disable the Link input
                            inputDocument.removeAttribute("disabled");
                            inputDocument.setAttribute("required", "required");
                            inputLink.setAttribute("disabled", "disabled");
                            inputLink.removeAttribute("required");
                        }
                    });
                });
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.hapus-materi');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = button.getAttribute('data-id'); // Ambil ID item

                    // Tampilkan SweetAlert konfirmasi
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Item ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Buat form delete secara dinamis
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '/delete-materi';

                            // Tambahkan token CSRF untuk melindungi dari serangan CSRF
                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content');
                            form.appendChild(csrfToken);

                            // Tambahkan input untuk ID item
                            const idInput = document.createElement('input');
                            idInput.type = 'hidden';
                            idInput.name = 'id';
                            idInput.value = itemId;
                            form.appendChild(idInput);

                            // Kirim form
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.hapus-quiz');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = button.getAttribute('data-id'); // Ambil ID item

                    // Tampilkan SweetAlert konfirmasi
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Item ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Buat form delete secara dinamis
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '/delete-quiz';

                            // Tambahkan token CSRF untuk melindungi dari serangan CSRF
                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content');
                            form.appendChild(csrfToken);

                            // Tambahkan input untuk ID item
                            const idInput = document.createElement('input');
                            idInput.type = 'hidden';
                            idInput.name = 'id';
                            idInput.value = itemId;
                            form.appendChild(idInput);

                            // Kirim form
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

@endsection
