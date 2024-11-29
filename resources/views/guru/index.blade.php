@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Guru</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahGuruModal">Tambah Guru</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="guruTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($guru as $gr)
                                        <tr data-id="{{ $gr->id }}">
                                            <td>{{ $gr->nama }}</td>
                                            <td>{{ $gr->nip }}</td>
                                            <td>{{ $gr->email }}</td>
                                            <td>{{ $gr->no_hp }}</td>
                                            <td>{{ $gr->alamat }}</td>
                                            <td>
                                                <button class="btn btn-link btn-primary btn-lg editBtnGuru" data-id="{{ $gr->id }}" data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-link btn-danger deleteBtnGuru" data-id="{{ $gr->id }}" data-toggle="tooltip" data-original-title="Hapus">
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
            <!-- Modal Tambah Guru -->
            <div class="modal fade" id="tambahGuruModal" tabindex="-1" role="dialog" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahGuruModalLabel">Tambah Guru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addGuruForm">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Guru -->
            <div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editGuruForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="editNama">Nama</label>
                                    <input type="text" class="form-control" id="editNama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="editNip">NIP</label>
                                    <input type="text" class="form-control" id="editNip" name="nip" required>
                                </div>
                                <div class="form-group">
                                    <label for="editEmail">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="editNoHp">No HP</label>
                                    <input type="text" class="form-control" id="editNoHp" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="editAlamat">Alamat</label>
                                    <textarea class="form-control" id="editAlamat" name="alamat" rows="3"></textarea>
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
