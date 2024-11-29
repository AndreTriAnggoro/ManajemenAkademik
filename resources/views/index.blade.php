@extends('layouts.master')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manajemen Data Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{-- Form Filter --}}
                        <div class="mb-4">
                            <form action="{{ route('kelas.filter') }}" method="POST" class="row g-3 align-items-center">
                                @csrf
                                <div class="col-md-8">
                                    <label for="kelas_id" class="form-label fw-bold">
                                        <i class="fas fa-chalkboard"></i> Pilih Kelas:
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-layer-group"></i>
                                        </span>
                                        <select name="kelas_id" id="kelas_id" class="form-select" required>
                                            <option value="" disabled selected>-- Pilih Kelas --</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}" 
                                                    {{ isset($kelasId) && $kelasId == $k->id ? 'selected' : '' }}>
                                                    {{ $k->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-search"></i> Tampilkan
                                    </button>
                                </div>
                            </form>
                        </div>
                        

                        {{-- List Siswa Berdasarkan Kelas --}}
                        @isset($siswaList)
                        <div class="table-responsive">
                            <table id="kelas2Table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($siswaList as $index => $siswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endisset

                        {{-- List Guru Berdasarkan Kelas --}}
                        @isset($guruList)
                        <div class="table-responsive mt-4">
                            <table id="guru2Table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Kelas</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($guruList as $index => $guru)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $guru->nip }}</td>
                                            <td>{{ $guru->nama }}</td>
                                            <td>{{ $kelas->find($kelasId)->nama_kelas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#kelasTable').DataTable();
        $('#guruTable').DataTable();
    });
</script>
@endpush
