@extends('layout.main')

@section('title', 'Quiz')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endsection

{{-- for navbar --}}
@section('home', '/')
@section('about', '/#about-link')
{{-- for navbar --}}

@section('content')

    <!-- Navbar -->
    @include('layout.navbar')
    <!-- Navbar -->

    <div class="navigation">
        <a href="javascript:history.go(-1)" class="back">
            <i class="bi bi-chevron-compact-left"></i>
        </a>

        <div class="title">
            <div class="top">
                Quiz Kompetensi 1
            </div>
            <div class="bottom">
                Belajar bersama thomas shelby
            </div>
        </div>
    </div>

    <form action="/store-answer" enctype="multipart/form-data" method="post" id="formulir">
        @csrf

        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <input type="hidden" name="course_id" value="{{ $quiz->course->id }}">
        <section class="main">
            <div class="pertanyaan">
                <div class="for-quest">
                    <div class="title">
                        Pertanyaan
                    </div>
                    <div class="value">
                        {{ $quiz->pertanyaan }}
                    </div>
                </div>

                @if ($quiz->gambar)
                    <div class="for-img" data-bs-target="#image-modal" data-bs-toggle="modal">
                        <i class="bi bi-file-earmark-image"></i>
                    </div>
                @endif
            </div>

            <div class="sparate">

            </div>

            <div class="jawaban">
                <div class="title">
                    Jawaban
                </div>
                <div class="area-jawab">
                    <textarea name="answer" placeholder="Masukkan jawaban kamu . . ." required></textarea>
                </div>
                <div class="inclue-file">
                    <label class="form-label">Dokumen pendukung (opsional)</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="submit-answer">
                    <button type="submit" id="submitButton">
                        <i class="bi bi-cursor"></i> KIRIM JAWABAN
                    </button>
                </div>
            </div>
        </section>
    </form>

    <div class="modal fade" id="image-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('Uploads/for-quiz' . $quiz->gambar) }}">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('internal')
    <script>
        document.getElementById('submitButton').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda hanya dapat mengerjakan kuis ini satu kali! ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formulir').submit();
                }
            });
        });
    </script>
@endsection
