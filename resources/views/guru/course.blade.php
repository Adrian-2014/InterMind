@extends('guru.layout.main')

@section('title', 'Course - Guru')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/guru/course.css') }}">

@endsection

@section('content')

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('guru.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">

                @include('guru.layout.nav')

                <div class="content-wrapper">
                    <div class="row courses">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 for-things">
                                    <div class="title">
                                        Course Kamu
                                    </div>

                                    <div class="action">
                                        <div class="add" data-bs-toggle="modal" data-bs-target="#add-course">
                                            <i class='bx bx-book-add'></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- For Loop --}}

                                @for ($i = 0; $i < 10; $i++)
                                    <div class="col-3">
                                        <div class="item">
                                            <div class="for-img">
                                                <img src="{{ asset('property-img/astronomy-example.jpg') }}">
                                            </div>
                                            <div class="for-detail">
                                                <div class="name">
                                                    Belajar Bahasa Arab Lancar
                                                </div>
                                                <div class="desc">
                                                    Menghafal huruf huruf Hijaiyah arab beserta harakatnya.
                                                </div>
                                            </div>

                                            <div class="for-act">
                                                <div class="act edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>
                                                <div class="act detail">
                                                    <i class="bi bi-grid-fill"></i>
                                                </div>
                                                <div class="act hapus">
                                                    <i class="bi bi-trash3"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                {{-- For Loop --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Layout Page --}}
        </div>

    </div>

    {{-- Modal Tambah Course --}}

    <div class="modal fade tambah" id="add-course" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/" enctype="multipart/form-data" method="post">
                        <div class="row damn">
                            <div class="col-6 photo">
                                <div class="row">
                                    <div class="col-12 upload">
                                        <label class="form-label">Unggah Gambar</label>
                                        <input type="file" class="filepond" name="imagess" accept="image/*" required>
                                        <input type="file" name="image" id="hiddenImageInput" hidden>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6 txt" x-data="{ type: '', tipe: '', }">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label">Nama Course</div>
                                        <input type="text" name="name" class="form-control" required
                                            placeholder="Belajar Sains..">

                                    </div>
                                    <div class="col-12 drop">
                                        <label class="form-label">Tipe Course</label>
                                        <div class="special">
                                            <input type="text" class="form-control" readonly required x-model="tipe">
                                            <input type="hidden" class="form-control" name="type_course" x-model="type">
                                            <div class="dropdown">
                                                <div class=" dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="bi bi-caret-down-fill"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    @foreach ($type_course as $item)
                                                        <div class="item"
                                                            @click="type='{{ $item->id }}', tipe='{{ $item->name_type }}' ">
                                                            <div class="for-icon">
                                                                <img
                                                                    src="{{ asset('Uploads/for-course_type/' . $item->gambar) }}">
                                                            </div>
                                                            <div class="for-text">
                                                                {{ $item->name_type }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label">Deskripsi</div>
                                        <textarea name="" id="" required placeholder="Belajar sains bagi pemula.."></textarea>
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

    {{-- Modal Tambah Course --}}
@endsection

@section('internal')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginImagePreview);

            // Menangani semua elemen filepond baik pada form tambah maupun edit
            const filePondElements = document.querySelectorAll('.filepond');

            filePondElements.forEach((filePondElement) => {
                const id = filePondElement.getAttribute('data-id'); // Ambil data-id untuk form edit

                // Inisialisasi FilePond untuk setiap elemen
                const filePondInstance = FilePond.create(filePondElement, {
                    allowMultiple: false,
                    instantUpload: false,
                    stylePanelAspectRatio: 9 / 16,
                    imagePreviewHeight: 100,
                    imagePreviewUpscale: true,
                    labelIdle: `
            <div class="labels">
                <div class="for-icon">
                    <i class="bi bi-upload"></i>
                </div>
                <div class="for-text">
                    Upload (Disarankan 16:9)
                </div>
            </div>
        `,
                });

                // Sinkronkan file ke input hidden yang sesuai
                filePondInstance.on('addfile', (error, file) => {
                    if (!error) {
                        const hiddenInput = document.getElementById(id ? `hiddenImageInput-${id}` :
                            'hiddenImageInput');
                        const dataTransfer = new DataTransfer();

                        dataTransfer.items.add(file.file);
                        hiddenInput.files = dataTransfer.files;
                    }
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
            const deleteButtons = document.querySelectorAll('.act.delete');

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
                            form.action = '/delete-course_type';

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