@extends('guru.layout.main')

@section('title', 'Rating & Ulasan - Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/guru/rating_ulasan.css') }}">

@endsection

@section('content')

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('guru.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">
                @include('guru.layout.nav')

                <div class="content-wrapper">
                    <div class="row rating_ulasan">
                        <div class="col-12">
                            <div class="header">
                                <div class="title">
                                    Rating & Ulasan
                                </div>
                                <div class="subtitle">
                                    Pendapat user tentang course anda!
                                </div>
                            </div>

                            <div class="main-rate">
                                <div class="rate">
                                    <div class="rate-value">
                                        {{ number_format($rate, 1) }}
                                    </div>
                                    <div class="rate-star">
                                        @for ($i = 0; $i < $rate; $i++)
                                            <i class="bi bi-star-fill active"></i>
                                        @endfor
                                        @for ($i = $rate; $i < 5; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="scale">
                                    <div class="scale-list">
                                        <div class="left">
                                            5 <i class="bi bi-star-fill"></i>
                                        </div>

                                        <div class="right progress" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: {{ floor($fiveRate) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scale-list">
                                        <div class="left">
                                            4 <i class="bi bi-star-fill"></i>
                                        </div>

                                        <div class="right progress" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: {{ floor($fourRate) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scale-list">
                                        <div class="left">
                                            3 <i class="bi bi-star-fill"></i>
                                        </div>

                                        <div class="right progress" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: {{ floor($threeRate) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scale-list">
                                        <div class="left">
                                            2 <i class="bi bi-star-fill"></i>
                                        </div>

                                        <div class="right progress" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: {{ floor($twoRate) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scale-list">
                                        <div class="left">
                                            1 <i class="bi bi-star-fill"></i>
                                        </div>

                                        <div class="right progress" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: {{ floor($oneRate) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="count">
                                    <div class="count-course">
                                        {{ $reviewers }} Reviewers
                                    </div>
                                    <div class="count-user">
                                        {{ $courseReview }} Course
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row list-ulasan">
                        @foreach ($ulasan as $item)
                            <div class="col-4">
                                <div class="ulasan" data-bs-toggle="modal" data-bs-target="#view-ulasan{{ $item->id }}">
                                    <div class="top">
                                        <div class="course-name">
                                            {{ $item->course->name }}
                                        </div>
                                        <div class="stars">
                                            @for ($i = 0; $i < $rate; $i++)
                                                <i class="bi bi-star-fill active"></i>
                                            @endfor
                                            @for ($i = 5; $i > $rate; $i--)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="main">
                                        <i class="bi bi-quote"></i>
                                        <div class="txt">
                                            {{ $item->ulasan }}
                                        </div>
                                    </div>
                                    <div class="user">
                                        <div class="for-img">
                                            @if (!is_null($item->user->profil))
                                                <img src="{{ asset('Uploads/for-profil/' . $item->user->profil) }}">
                                            @else
                                                <img src="{{ asset('property-img/profile.jpg') }}">
                                            @endif
                                        </div>
                                        <div class="for-detail">
                                            <div class="username">{{ $item->user->name }}</div>
                                            <div class="status">Pelajar</div>
                                        </div>
                                    </div>
                                    <div class="for-post">
                                        Diposting pada
                                        <span>
                                            {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('j F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            {{-- Layout Page --}}
        </div>

    </div>

    @foreach ($ulasan as $modal)
        {{-- Modal Tambah Course --}}
        <div class="modal fade view" id="view-ulasan{{ $modal->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="ulasan">
                            <div class="top">
                                <div class="course-name">
                                    {{ $modal->course->name }}
                                </div>
                                <div class="stars">
                                    @for ($i = 0; $i < $rate; $i++)
                                        <i class="bi bi-star-fill active"></i>
                                    @endfor
                                    @for ($i = 5; $i > $rate; $i--)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="main">
                                <i class="bi bi-quote"></i>
                                <div class="txt">
                                    {{ $modal->ulasan }}
                                </div>
                            </div>
                            <div class="user">
                                <div class="for-img">
                                    @if (!is_null($modal->user->profil))
                                        <img src="{{ asset('Uploads/for-profil/' . $modal->user->profil) }}">
                                    @else
                                        <img src="{{ asset('property-img/profile.jpg') }}">
                                    @endif
                                </div>
                                <div class="for-detail">
                                    <div class="username">{{ $modal->user->name }}</div>
                                    <div class="status">Pelajar</div>
                                </div>
                            </div>
                            <div class="for-post">
                                Diposting pada
                                <span>
                                    {{ \Carbon\Carbon::parse($modal->updated_at)->translatedFormat('j F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Tambah Course --}}
    @endforeach

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
