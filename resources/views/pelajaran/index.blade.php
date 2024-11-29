@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Mata Pelajaran</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMataPelajaranModal">Tambah Mata Pelajaran</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mataPelajaranTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Mata Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Mata Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($mataPelajaran as $mp)
                                        <tr data-id="{{ $mp->id }}">
                                            <td>{{ $mp->nama }}</td>
                                            <td>{{ $mp->deskripsi }}</td>
                                            <td>
                                                <button class="btn btn-link btn-danger deleteBtnMataPelajaran" data-id="{{ $mp->id }}" data-toggle="tooltip" data-original-title="Hapus">
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
            <!-- Modal Tambah Mata Pelajaran -->
            <div class="modal fade" id="tambahMataPelajaranModal" tabindex="-1" role="dialog" aria-labelledby="tambahMataPelajaranModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahMataPelajaranModalLabel">Tambah Mata Pelajaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addMataPelajaranForm">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
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
        </div>
    </div>
</div>
@endsection
