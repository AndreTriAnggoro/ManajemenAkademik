@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0 text-white">Data Berdasarkan Kelas</h4>
                            <div class="btn-group" role="group" aria-label="Filter">
                                <a href="{{ route('listKelasDenganSiswaDanGuru', ['viewType' => 'siswa']) }}"
                                    class="btn btn-light @if ($viewType === 'siswa') active @endif">Data Siswa</a>
                                <a href="{{ route('listKelasDenganSiswaDanGuru', ['viewType' => 'guru']) }}"
                                    class="btn btn-light @if ($viewType === 'guru') active @endif">Data Guru</a>
                                <a href="{{ route('listKelasDenganSiswaDanGuru', ['viewType' => 'both']) }}"
                                    class="btn btn-light @if ($viewType === 'both') active @endif">Data Siswa dan
                                    Guru</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="kelasTable" class="table table-bordered table-hover align-middle text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <th>
                                                @if ($viewType === 'guru' || $viewType === 'both')
                                                    Daftar Guru
                                                @else
                                                    Daftar Siswa
                                                @endif
                                            </th>
                                            @if ($viewType === 'both')
                                                <th>Daftar Siswa</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas as $k)
                                            <tr data-id="{{ $k->id }}">
                                                <td><strong>{{ $k->nama_kelas }}</strong></td>

                                                {{-- Daftar Guru --}}
                                                <td>
                                                    @if ($viewType === 'guru' || $viewType === 'both')
                                                        <ul class="list-group list-group-flush">
                                                            @forelse ($k->gurus->unique('id') as $guru)
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div>
                                                                        <strong>{{ $guru->nama }}</strong> (NIP:
                                                                        {{ $guru->nip }})
                                                                        <ul>
                                                                            @forelse ($guru->mataPelajarans->filter(fn($mapel) => $mapel->pivot->kelas_id == $k->id) as $mapel)
                                                                                <li class="text small"> Mengampu mapel
                                                                                    {{ $mapel->nama }}</li>
                                                                            @empty
                                                                                <li class="text-muted small">Tidak ada mata
                                                                                    pelajaran</li>
                                                                            @endforelse
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                                <li class="list-group-item text-muted">Tidak ada guru</li>
                                                            @endforelse
                                                        </ul>
                                                    @elseif ($viewType === 'siswa')
                                                        <ul class="list-group list-group-flush">
                                                            @forelse ($k->siswas as $siswa)
                                                                <li class="list-group-item">
                                                                    <strong>{{ $siswa->nama }}</strong> (NISN:
                                                                    {{ $siswa->nisn }})
                                                                </li>
                                                            @empty
                                                                <li class="list-group-item text-muted">Tidak ada siswa</li>
                                                            @endforelse
                                                        </ul>
                                                    @endif
                                                </td>

                                                {{-- Daftar Siswa --}}
                                                @if ($viewType === 'both')
                                                    <td>
                                                        <ul class="list-group list-group-flush">
                                                            @forelse ($k->siswas as $siswa)
                                                                <li class="list-group-item">
                                                                    <strong>{{ $siswa->nama }}</strong> (NISN:
                                                                    {{ $siswa->nisn }})
                                                                </li>
                                                            @empty
                                                                <li class="list-group-item text-muted">Tidak ada siswa</li>
                                                            @endforelse
                                                        </ul>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <small class="text-muted">Data diperbarui secara berkala.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
