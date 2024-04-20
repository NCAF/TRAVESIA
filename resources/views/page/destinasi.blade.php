@extends('layouts.app')

@section('title', 'Destinasi')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Destinasi</h4>

                            <div class="align-right text-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    Tambah Destinasi
                                </button>
                            </div>
                            <br>
                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Destinasi Awal</th>
                                            <th class="text-center">Destinasi Akhir</th>
                                            <th class="text-center">Jenis Kendaraan</th>
                                            <th class="text-center">No Plat</th>
                                            <th class="text-center">Hari Berangkat</th>
                                            <th class="text-center">Jumlah Kursi</th>
                                            <th class="text-center">Jumlah Bagasi</th>
                                            <th class="text-center">Detail</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($destinations as $no => $dst)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $dst->destinasi_awal }}</td>
                                                <td class="text-center">{{ $dst->destinasi_akhir }}</td>
                                                <td class="text-center">{{ $dst->jenis_kendaraan }}</td>
                                                <td class="text-center">{{ $dst->no_plat }}</td>
                                                <td class="text-center">{{ $dst->hari_berangkat }}</td>
                                                <td class="text-center">{{ $dst->jumlah_kursi }}</td>
                                                <td class="text-center">{{ $dst->jumlah_bagasi }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#detailModal{{ $dst->id }}">
                                                        Detail
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="detailModal{{ $dst->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                        Destinasi</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ asset('foto_destinasi/' . $dst->foto) }}"
                                                                        class="img-fluid" alt="Foto"
                                                                        style="max-width: 100%; height: auto;">
                                                                    <p>{{ $dst->deskripsi }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editDestinasiModal{{ $dst->id }}"
                                                            type="button" class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $dst->id }}" method="post"
                                                            action="{{ route('destinasi.destroy', $dst->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $dst->id }}')">Delete</button>
                                                        </form>
                                                        <script>
                                                            function confirmDelete(userId) {
                                                                Swal.fire({
                                                                    title: 'Yakin Mo Ngapus Bro?',
                                                                    text: "Nggak bakal bisa balik lo",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // Submit form untuk menghapus data
                                                                        document.getElementById('deleteForm-' + userId).submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </span>
                                                </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambah Desinasi Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Destinasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="destinasi_awal" class="form-label">Destinasi Awal</label>
                                        <input type="text" class="form-control" id="destinasi_awal"
                                            name="destinasi_awal" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="destinasi_akhir" class="form-label">Destinasi Akhir</label>
                                        <input type="text" class="form-control" id="destinasi_akhir"
                                            name="destinasi_akhir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                        <input type="text" class="form-control" id="jenis_kendaraan"
                                            name="jenis_kendaraan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="no_plat" class="form-label">Nomor Plat</label>
                                        <input type="text" class="form-control" id="no_plat" name="no_plat"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="hari_berangkat" class="form-label">Hari Berangkat</label>
                                        <input type="date" class="form-control" id="hari_berangkat"
                                            name="hari_berangkat" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                        <input type="number" class="form-control" id="jumlah_kursi" name="jumlah_kursi"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jumlah_bagasi" class="form-label">Jumlah Bagasi</label>
                                        <input type="number" class="form-control" id="jumlah_bagasi"
                                            name="jumlah_bagasi" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto"
                                            required accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Pengguna -->
        @foreach ($destinations as $dst)
            <div class="modal fade" id="editDestinasiModal{{ $dst->id }}" tabindex="-1"
                aria-labelledby="editDestinasiModalLabel{{ $dst->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDestinasiModalLabel{{ $dst->id }}">Edit Destinasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('destinasi.update', ['id' => $dst->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="destinasi_awal" class="form-label">Destinasi Awal</label>
                                            <input type="text" class="form-control" id="destinasi_awal"
                                                name="destinasi_awal" value="{{ $dst->destinasi_awal }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="destinasi_akhir" class="form-label">Destinasi Akhir</label>
                                            <input type="text" class="form-control" id="destinasi_akhir"
                                                name="destinasi_akhir" value="{{ $dst->destinasi_akhir }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                            <input type="text" class="form-control" id="jenis_kendaraan"
                                                name="jenis_kendaraan" value="{{ $dst->jenis_kendaraan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="no_plat" class="form-label">Nomor Plat</label>
                                            <input type="text" class="form-control" id="no_plat" name="no_plat"
                                                value="{{ $dst->no_plat }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="hari_berangkat" class="form-label">Hari Berangkat</label>
                                            <input type="date" class="form-control" id="hari_berangkat"
                                                name="hari_berangkat" value="{{ $dst->hari_berangkat }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                                            <input type="number" class="form-control" id="jumlah_kursi"
                                                name="jumlah_kursi" value="{{ $dst->jumlah_kursi }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="jumlah_bagasi" class="form-label">Jumlah Bagasi</label>
                                            <input type="number" class="form-control" id="jumlah_bagasi"
                                                name="jumlah_bagasi" value="{{ $dst->jumlah_bagasi }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $dst->deskripsi }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
        @if (session('notification'))
            <script>
                $(document).ready(function() {
                    const {
                        title,
                        text,
                        type
                    } = @json(session('notification'));
                    Swal.fire(title, text, type);
                });
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#createModal').on('hidden.bs.modal', function() {
                    $(this).find('form')[0].reset();
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    @endsection
