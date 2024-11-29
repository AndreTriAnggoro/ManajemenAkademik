@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kelas</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelasModal">Tambah Kelas</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="kelasTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Kelas</th>
                                        <th>Tingkat</th>
                                        <th>Deskripsi</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Kelas</th>
                                        <th>Tingkat</th>
                                        <th>Deskripsi</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($kelas as $kls)
                                        <tr data-id="{{ $kls->id }}">
                                            <td>{{ $kls->nama_kelas }}</td>
                                            <td>{{ $kls->tingkat }}</td>
                                            <td>{{ $kls->deskripsi }}</td>
                                            <td>
                                                <button class="btn btn-link btn-primary btn-lg editBtnKelas" data-id="{{ $kls->id }}" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-link btn-danger deleteBtnKelas" data-id="{{ $kls->id }}" data-toggle="tooltip" data-original-title="Hapus">
                                                    <i class="fa fa-times"></i>
                                                </button> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Kelas -->
            <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addKelasForm">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat">Tingkat</label>
                                    <input type="number" class="form-control" id="tingkat" name="tingkat" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Kelas -->
            <div class="modal fade" id="editKelasModal" tabindex="-1" aria-labelledby="editKelasModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editKelasForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="editNamaKelas">Nama Kelas</label>
                                    <input type="text" class="form-control" id="editNamaKelas" name="nama_kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="editTingkat">Tingkat</label>
                                    <input type="number" class="form-control" id="editTingkat" name="tingkat" required>
                                </div>
                                <div class="form-group">
                                    <label for="editDeskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="editDeskripsi" name="deskripsi" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
