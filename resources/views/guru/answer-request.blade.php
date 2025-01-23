@extends('guru.layout.main')

@section('title', 'Course - Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/guru/answer-request.css') }}">

@endsection

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
                            <div class="for-request">
                                <div class="header">
                                    <div class="title">
                                        QUIZ KAMU
                                    </div>
                                    <div class="subtitle">
                                        {{ $answerCount }} Permmintaan verivikasi jawaban
                                    </div>
                                </div>

                                <div class="table">
                                    <div class="head">
                                        <div class="head-list course-quiz">
                                            Course / Quiz
                                        </div>

                                        <div class="head-list user">
                                            User
                                        </div>
                                        <div class="head-list tgl">
                                            Tanggal
                                        </div>
                                        <div class="head-list action">
                                            Action
                                        </div>
                                    </div>

                                    <div class="body">
                                        @foreach ($answers as $answer)
                                            <div class="body-loop">
                                                <div class="body-list course-quiz">
                                                    <div class="for-img">
                                                        <img
                                                            src="{{ asset('Uploads/for-course/' . $answer->quiz->course->gambar) }}">
                                                    </div>
                                                    <div class="for-detail">
                                                        <div class="quiz-name">
                                                            {{ $answer->quiz->judul }}
                                                        </div>
                                                        <div class="course-name">
                                                            {{ $answer->quiz->course->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body-list user">
                                                    <div class="name">
                                                        {{ $answer->user->name }}
                                                    </div>
                                                    <div class="email">
                                                        {{ $answer->user->email }}
                                                    </div>
                                                </div>
                                                <div class="body-list tgl">
                                                    {{ \Carbon\Carbon::parse($answer->created_at)->translatedFormat('j F Y') }}
                                                </div>
                                                <div class="body-list action">
                                                    <a href="/guru-answer_verification/{{ $answer->id }}">
                                                        <i class="bi bi-grid"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach


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
@endsection
