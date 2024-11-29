@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Guru Mata Pelajaran</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahGuruKelasMapelModal">Tambah Guru dan Mapel</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="guruKelasMapelTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Nama Kelas</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Nama Kelas</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($guruKelasMapels as $gkm)
                                            <tr data-id="{{ $gkm->id }}">
                                                <td>{{ $gkm->guru->nama }}</td>
                                                <td>{{ $gkm->kelas->nama_kelas }}</td>
                                                <td>{{ $gkm->mataPelajaran->nama }}</td>
                                                <td>
                                                    <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                                        data-target="#editGuruKelasMapelModal{{ $gkm->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-link btn-danger" data-toggle="modal"
                                                        data-target="#deleteGuruKelasMapelModal"
                                                        data-id="{{ $gkm->id }}" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editGuruKelasMapelModal{{ $gkm->id }}" tabindex="-1"
                                                aria-labelledby="editGuruKelasMapelModalLabel{{ $gkm->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editGuruKelasMapelModalLabel{{ $gkm->id }}">
                                                                Edit Guru Kelas Mapel
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('guru_kelas_mapel.update', $gkm->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="editGuru_id{{ $gkm->id }}">Nama Guru</label>
                                                                    <select class="form-control" id="editGuru_id{{ $gkm->id }}" name="guru_id"
                                                                        required>
                                                                        @foreach ($gurus as $guru)
                                                                            <option value="{{ $guru->id }}"
                                                                                {{ $guru->id == $gkm->guru->id ? 'selected' : '' }}>
                                                                                {{ $guru->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editKelas_id{{ $gkm->id }}">Nama Kelas</label>
                                                                    <select class="form-control" id="editKelas_id{{ $gkm->id }}" name="kelas_id"
                                                                        required>
                                                                        @foreach ($kelas as $kls)
                                                                            <option value="{{ $kls->id }}"
                                                                                {{ $kls->id == $gkm->kelas->id ? 'selected' : '' }}>
                                                                                {{ $kls->nama_kelas }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="editMataPelajaran_id{{ $gkm->id }}">Mata Pelajaran</label>
                                                                    <select class="form-control" id="editMataPelajaran_id{{ $gkm->id }}"
                                                                        name="mata_pelajaran_id" required>
                                                                        @foreach ($mataPelajarans as $mapel)
                                                                            <option value="{{ $mapel->id }}"
                                                                                {{ $mapel->id == $gkm->mataPelajaran->id ? 'selected' : '' }}>
                                                                                {{ $mapel->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Guru Kelas Mapel -->
                <div class="modal fade" id="tambahGuruKelasMapelModal" tabindex="-1" role="dialog"
                    aria-labelledby="tambahGuruKelasMapelModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahGuruKelasMapelModalLabel">Tambah Guru Kelas Mapel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addGuruKelasMapelForm" action="{{ route('guru_kelas_mapel.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="guru_id">Nama Guru</label>
                                        <select class="form-control" id="guru_id" name="guru_id" required>
                                            @foreach ($gurus as $guru)
                                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas_id">Nama Kelas</label>
                                        <select class="form-control" id="kelas_id" name="kelas_id" required>
                                            @foreach ($kelas as $kls)
                                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="mata_pelajaran_id">Mata Pelajaran</label>
                                        <select class="form-control" id="mata_pelajaran_id" name="mata_pelajaran_id"
                                            required>
                                            @foreach ($mataPelajarans as $mapel)
                                                <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Hapus Guru Kelas Mapel -->
                <div class="modal fade" id="deleteGuruKelasMapelModal" tabindex="-1"
                    aria-labelledby="deleteGuruKelasMapelModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteGuruKelasMapelModalLabel">Konfirmasi Penghapusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                <form id="deleteGuruKelasMapelForm"
                                    action="{{ route('guru_kelas_mapel.destroy', ':id') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
