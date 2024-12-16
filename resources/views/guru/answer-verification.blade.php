@extends('guru.layout.main')

@section('title', 'Verifikasi Jawaban - Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/guru/answer-verification.css') }}">

@endsection

@section('sub-quiz')
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="#" class="menu-link">
                <div data-i18n="Without menu">Verifikasi Jawaban</div>
            </a>
        </li>
    </ul>
@endsection
@section('sub-act', 'open')

@section('content')

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('guru.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">
                @include('guru.layout.nav')

                <div class="content-wrapper">
                    <div class="row request">
                        <div class="col-12">
                            <div class="row for-verify">
                                <div class="col-5">
                                    <div class="for-course">
                                        <div class="head">
                                            <div class="for-icon">
                                                <i class="bi bi-box"></i>
                                            </div>
                                            <div class="title">
                                                Course - Quiz
                                            </div>
                                        </div>

                                        <div class="value">
                                            <div class="for-img">
                                                <img
                                                    src="{{ asset('Uploads/for-course/' . $answer->quiz->course->gambar) }}">
                                            </div>

                                            <div class="for-detail">
                                                <div class="name">
                                                    <div class="quiz-name">
                                                        {{ $answer->quiz->judul }}
                                                    </div>
                                                    <div class="course-name">
                                                        {{ $answer->quiz->course->name }}
                                                    </div>
                                                </div>
                                                <div class="type">
                                                    <div class="txt">
                                                        Type:
                                                    </div>
                                                    <div class="value-type">
                                                        {{ $answer->quiz->course->type_course->name_type }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="for-user">
                                        <div class="head">
                                            <div class="for-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <div class="title">
                                                User
                                            </div>
                                        </div>
                                        <div class="value">
                                            <div class="list">
                                                <div class="kanan">
                                                    Nama User:
                                                </div>
                                                <div class="kiri nama">
                                                    {{ $answer->user->name }}
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="kanan">
                                                    Email User:
                                                </div>
                                                <div class="kiri email">
                                                    {{ $answer->user->email }}
                                                </div>
                                            </div>
                                            <div class="list">
                                                <div class="kanan">
                                                    Tanggal Dikirim:
                                                </div>
                                                <div class="kiri tgl">
                                                    {{ \Carbon\Carbon::parse($answer->created_at)->translatedFormat('j F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <section class="main">
                                        <div class="pertanyaan">
                                            <div class="for-quest">
                                                <div class="title">
                                                    Pertanyaan
                                                </div>
                                                <div class="value">
                                                    {{ $answer->quiz->pertanyaan }}
                                                </div>
                                            </div>

                                            @if ($answer->quiz->gambar)
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
                                                <textarea placeholder="Masukkan jawaban kamu . . ." readonly>{{ $answer->jawaban }}</textarea>
                                            </div>
                                            <div class="action">

                                                <div class="wrap">
                                                    @if ($answer->file)
                                                        <a href="{{ asset('Uploads/for-answer/' . $answer->file) }}"
                                                            target="_blank" class="for-img">
                                                            <i class="bi bi-file-earmark-image"></i>
                                                        </a>
                                                    @endif
                                                </div>

                                                <div class="for-nilai">
                                                    <form action="/store-wrong_answer" method="post" id="wrongFormulir">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $answer->id }}">

                                                        <button type="submit" id="falseButton">
                                                            <i class="bi bi-x-circle"></i> SALAH
                                                        </button>
                                                    </form>

                                                    <form action="/store-right_answer" method="post" id="rightFormulir">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $answer->id }}">

                                                        <button type="submit" id="trueButton">
                                                            <i class="bi bi-check2-all"></i> BENAR
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </section>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Layout Page --}}
        </div>

    </div>

    <div class="modal fade" id="image-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('Uploads/for-quiz' . $answer->quiz->gambar) }}">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('internal')
    <script>
        document.getElementById('trueButton').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan memberi nilai Benar kepada jawaban user ini! ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('rightFormulir').submit();
                }
            });
        });
    </script>

    <script>
        document.getElementById('falseButton').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan memberi nilai salah kepada jawaban user ini! ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('wrongFormulir').submit();
                }
            });
        });
    </script>
@endsection
