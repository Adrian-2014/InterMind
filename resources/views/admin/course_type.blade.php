@extends('admin.layout.main')

@section('title', 'Course - Admin')

@section('link')
    <link rel="stylesheet" href="{{ asset('css/admin/course_type.css') }}">
@endsection

@section('content')

    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            @include('admin.layout.aside')

            {{-- Layout Page --}}
            <div class="layout-page">

                @include('admin.layout.nav')

                <div class="content-wrapper">
                    <div class="row courses">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 for-things">
                                    <div class="title">
                                        Type Course List
                                    </div>

                                    <div class="action">
                                        <div class="add" data-bs-toggle="modal" data-bs-target="#add-course">
                                            <i class='bx bx-book-add'></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- For Loop --}}

                                @foreach ($types as $type)
                                    <div class="col-3">
                                        <div class="item">
                                            <div class="for-head">
                                                <div class="for-logo">
                                                    <img src="{{ asset('Uploads/for-course_type/' . $type->gambar) }}">
                                                </div>
                                                <div class="name">
                                                    {{ $type->name_type }}
                                                </div>
                                            </div>
                                            <div class="deskripsi">
                                                {{ Str::limit($type->deskripsi, 80, '...') }}
                                            </div>
                                            <div class="action">
                                                <div class="act edit" data-bs-toggle="modal"
                                                    data-bs-target="#edit-type-{{ $type->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>
                                                <div class="act delete" data-id="{{ $type->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- For Loop --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- Layout Page --}}
    </div>

    {{-- Modal Tambah Course Type --}}
    <div class="modal fade tambah" id="add-course" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-head">
                        <img src="{{ asset('property-img/logo.png') }}">
                    </div>
                    <div class="info">
                        <i class="bi bi-boxes"></i>
                        TAMBAH TIPE COURSE
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/add-type-course" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Nama Tipe</label>
                                <input type="text" name="name" class="form-control" required
                                    placeholder="Astronomi, Filsafat, etc.." maxlength="25">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" placeholder="Berikan deskripsi singkat tentang tipe ini.." maxlength="450"></textarea>
                            </div>
                            <div class="col-12
                                    upload">
                                <label class="form-label">Unggah Gambar</label>
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-8"><input type="file" class="filepond tb-file" name="imagess"
                                            accept="image/png, image/jpeg, image/png" required>
                                        <input type="file" name="image" id="hiddenImageInput" hidden>
                                    </div>
                                    <div class="col-2"></div>
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
    {{-- Modal Tambah Course Type --}}


    @foreach ($types as $modal)
        {{-- Modal Edit Course Type --}}
        <div class="modal fade edit" id="edit-type-{{ $modal->id }}" tabindex="-1">
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
                        <form action="/update-type-course" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Nama Tipe</label>
                                    <input type="hidden" name="id" value="{{ $modal->id }}">
                                    <input type="text" name="name" class="form-control" required
                                        placeholder="Astronomi, Filsafat, etc.." maxlength="25"
                                        value="{{ $modal->name_type }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" placeholder="Berikan deskripsi singkat tentang tipe ini.." maxlength="450">{{ $modal->deskripsi }}</textarea>
                                </div>
                                <div class="col-12
                                    upload">
                                    <label class="form-label">Unggah Gambar</label>
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-8"><input type="file" class="filepond"
                                                data-id="{{ $modal->id }}" name="imagess"
                                                accept="image/png, image/jpeg, image/png">
                                            <input type="file" name="image"
                                                id="hiddenImageInput-{{ $modal->id }}" hidden>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="for-submits">
                                <button type="submit" class="submits">
                                    <div class="txt">
                                        PERBARUI
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
        {{-- Modal Edit Course Type --}}
    @endforeach
@endsection

@section('internal')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);


            // Menangani semua elemen filepond baik pada form tambah maupun edit
            const filePondElements = document.querySelectorAll('.filepond');

            filePondElements.forEach((filePondElement) => {
                const id = filePondElement.getAttribute('data-id'); // Ambil data-id untuk form edit

                // Inisialisasi FilePond untuk setiap elemen
                const filePondInstance = FilePond.create(filePondElement, {
                    allowMultiple: false,
                    instantUpload: false,
                    stylePanelAspectRatio: 1 / 1,
                    imagePreviewHeight: 100,
                    imagePreviewUpscale: true,
                    acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'],
                    allowFileTypeValidation: true,
                    labelIdle: `
                <div class="labels">
                    <div class="for-icon">
                        <i class="bi bi-upload"></i>
                    </div>
                    <div class="for-text">
                        Upload (Disarankan 1:1)
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
