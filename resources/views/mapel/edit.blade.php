<x-app-layout>
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.min.js') }}"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="{{ route('mapel.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('mapel.update', $mapel->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div id="step1">
                                <div class="card-body">
                                    <h3 class="card-title">Mata Pelajaran</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tahun Ajaran</label>
                                                <select class="form-control form-select" name="tahun_ajaran">
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    <option value="2024-2025"
                                                        {{ $mapel->tahun_ajaran == '2024-2025' ? 'selected' : '' }}>
                                                        2024-2025</option>
                                                    <option value="2025-2026"
                                                        {{ $mapel->tahun_ajaran == '2025-2026' ? 'selected' : '' }}>
                                                        2025-2026</option>
                                                    <option value="2026-2027"
                                                        {{ $mapel->tahun_ajaran == '2026-2027' ? 'selected' : '' }}>
                                                        2026-2027</option>
                                                    <option value="2027-2028"
                                                        {{ $mapel->tahun_ajaran == '2027-2028' ? 'selected' : '' }}>
                                                        2027-2028</option>
                                                    <option value="2028-2029"
                                                        {{ $mapel->tahun_ajaran == '2028-2029' ? 'selected' : '' }}>
                                                        2028-2029</option>
                                                    <option value="2029-2030"
                                                        {{ $mapel->tahun_ajaran == '2029-2030' ? 'selected' : '' }}>
                                                        2029-2030</option>
                                                </select>
                                                @error('tahun_ajaran')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>
                                                <select class="form-control form-select" name="kelas">
                                                    <option value="">Pilih Kelas</option>
                                                    <option value="X"
                                                        {{ $mapel->kelas == 'X' ? 'selected' : '' }}>X</option>
                                                    <option value="XI"
                                                        {{ $mapel->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                                    <option value="XII"
                                                        {{ $mapel->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                                    <option value="XIII"
                                                        {{ $mapel->kelas == 'XIII' ? 'selected' : '' }}>XIII</option>
                                                </select>
                                                @error('kelas')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-2" for="mapel">Mapel</label>
                                                <input type="text" class="form-control" id="mapel" name="mapel"
                                                    value="{{ $mapel->mapel }}" required>
                                                @error('mapel')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Kategori Kurikulum</label>
                                                <select class="form-control form-select" name="kategori_kurikulum">
                                                    <option value="">Pilih Kategori Kurikulum</option>
                                                    <option value="K13"
                                                        {{ $mapel->kategori_kurikulum == 'K13' ? 'selected' : '' }}>K13
                                                    </option>
                                                    <option value="KUMER"
                                                        {{ $mapel->kategori_kurikulum == 'KUMER' ? 'selected' : '' }}>
                                                        KUMER</option>
                                                </select>
                                                @error('kategori_kurikulum')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step2">
                                <div class="card-body">
                                    <h3 class="card-title">Buku Kerja 1</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">PKG</label>
                                                <input type="file" name="pkg" class="form-control">
                                                @error('pkg')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->pkg)
                                                    <p>{{ basename($mapel->pkg) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Silabus</label>
                                                <input type="file" name="silabus" class="form-control">
                                                @error('silabus')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->silabus)
                                                    <p>{{ basename($mapel->silabus) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">KI KD & SKL</label>
                                                <input type="file" name="ki_kd_skl" class="form-control">
                                                @error('ki_kd_skl')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->ki_kd_skl)
                                                    <p>{{ basename($mapel->ki_kd_skl) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step3">
                                <div class="card-body">
                                    <h3 class="card-title">Buku Kerja 2</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kode Etik, Ikrar Guru, dll</label>
                                                <input type="file" name="kode_etik" class="form-control">
                                                @error('kode_etik')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->kode_etik)
                                                    <p>{{ basename($mapel->kode_etik) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Program Semester</label>
                                                <input type="file" name="program_semester" class="form-control">
                                                @error('program_semester')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->program_semester)
                                                    <p>{{ basename($mapel->program_semester) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Program Tahunan</label>
                                                <input type="file" name="program_tahunan" class="form-control">
                                                @error('program_tahunan')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->program_tahunan)
                                                    <p>{{ basename($mapel->program_tahunan) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kaldik Sekolah</label>
                                                <input type="file" name="kaldik_sekolah" class="form-control">
                                                @error('kaldik_sekolah')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->kaldik_sekolah)
                                                    <p>{{ basename($mapel->kaldik_sekolah) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step4">
                                <div class="card-body">
                                    <h3 class="card-title">Buku Kerja 3</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Daftar Hadir Siswa</label>
                                                <input type="file" name="daftar_hadir_siswa" class="form-control">
                                                @error('daftar_hadir_siswa')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->daftar_hadir_siswa)
                                                    <p>{{ basename($mapel->daftar_hadir_siswa) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Jadwal Pelajaran</label>
                                                <input type="file" name="jadwal_pelajaran" class="form-control">
                                                @error('jadwal_pelajaran')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->jadwal_pelajaran)
                                                    <p>{{ basename($mapel->jadwal_pelajaran) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kisi-kisi, Soal, Kartu Soal</label>
                                                <input type="file" name="kisi_kisi_soal_kartu_soal"
                                                    class="form-control">
                                                @error('kisi_kisi_soal_kartu_soal')
                                                    <div class="text-danger mt-2"> {{ $message }} </div>
                                                @enderror
                                                @if ($mapel->kisi_kisi_soal_kartu_soal)
                                                    <p>{{ basename($mapel->kisi_kisi_soal_kartu_soal) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step5">
                                <div class="card-body">
                                    <h3 class="card-title">Buku Kerja 4</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 1</label>
                                                <input type="file" name="rpp_1" class="form-control">
                                                @error('rpp_1')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_1)
                                                    <p>{{ basename($mapel->rpp_1) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 1</label>
                                                <input type="file" name="pendukung_rpp_1" class="form-control">
                                                @error('pendukung_rpp_1')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_1)
                                                    <p>{{ basename($mapel->pendukung_rpp_1) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 2</label>
                                                <input type="file" name="rpp_2" class="form-control">
                                                @error('rpp_2')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_2)
                                                    <p>{{ basename($mapel->rpp_2) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 2</label>
                                                <input type="file" name="pendukung_rpp_2" class="form-control">
                                                @error('pendukung_rpp_2')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_2)
                                                    <p>{{ basename($mapel->pendukung_rpp_2) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 3</label>
                                                <input type="file" name="rpp_3" class="form-control">
                                                @error('rpp_3')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_3)
                                                    <p>{{ basename($mapel->rpp_3) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 3</label>
                                                <input type="file" name="pendukung_rpp_3" class="form-control">
                                                @error('pendukung_rpp_3')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_3)
                                                    <p>{{ basename($mapel->pendukung_rpp_3) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 4</label>
                                                <input type="file" name="rpp_4" class="form-control">
                                                @error('rpp_4')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_4)
                                                    <p>{{ basename($mapel->rpp_4) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 4</label>
                                                <input type="file" name="pendukung_rpp_4" class="form-control">
                                                @error('pendukung_rpp_4')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_4)
                                                    <p>{{ basename($mapel->pendukung_rpp_4) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 5</label>
                                                <input type="file" name="rpp_5" class="form-control">
                                                @error('rpp_5')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_5)
                                                    <p>{{ basename($mapel->rpp_5) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 5</label>
                                                <input type="file" name="pendukung_rpp_5" class="form-control">
                                                @error('pendukung_rpp_5')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_5)
                                                    <p>{{ basename($mapel->pendukung_rpp_5) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 6</label>
                                                <input type="file" name="rpp_6" class="form-control">
                                                @error('rpp_6')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_6)
                                                    <p>{{ basename($mapel->rpp_6) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 6</label>
                                                <input type="file" name="pendukung_rpp_6" class="form-control">
                                                @error('pendukung_rpp_6')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_6)
                                                    <p>{{ basename($mapel->pendukung_rpp_6) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 7</label>
                                                <input type="file" name="rpp_7" class="form-control">
                                                @error('rpp_1')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_7)
                                                    <p>{{ basename($mapel->rpp_7) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 7</label>
                                                <input type="file" name="pendukung_rpp_7" class="form-control">
                                                @error('pendukung_rpp_7')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_7)
                                                    <p>{{ basename($mapel->pendukung_rpp_7) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 8</label>
                                                <input type="file" name="rpp_8" class="form-control">
                                                @error('rpp_8')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_8)
                                                    <p>{{ basename($mapel->rpp_8) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 8</label>
                                                <input type="file" name="pendukung_rpp_8" class="form-control">
                                                @error('pendukung_rpp_8')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_8)
                                                    <p>{{ basename($mapel->pendukung_rpp_8) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 9</label>
                                                <input type="file" name="rpp_9" class="form-control">
                                                @error('rpp_9')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_9)
                                                    <p>{{ basename($mapel->rpp_9) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 9</label>
                                                <input type="file" name="pendukung_rpp_9" class="form-control">
                                                @error('pendukung_rpp_9')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_9)
                                                    <p>{{ basename($mapel->pendukung_rpp_9) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 10</label>
                                                <input type="file" name="rpp_10" class="form-control">
                                                @error('rpp_10')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_10)
                                                    <p>{{ basename($mapel->rpp_10) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 10</label>
                                                <input type="file" name="pendukung_rpp_10" class="form-control">
                                                @error('pendukung_rpp_10')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_10)
                                                    <p>{{ basename($mapel->pendukung_rpp_10) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 11</label>
                                                <input type="file" name="rpp_11" class="form-control">
                                                @error('rpp_11')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_11)
                                                    <p>{{ basename($mapel->rpp_11) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 11</label>
                                                <input type="file" name="pendukung_rpp_11" class="form-control">
                                                @error('pendukung_rpp_11')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_11)
                                                    <p>{{ basename($mapel->pendukung_rpp_11) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 12</label>
                                                <input type="file" name="rpp_12" class="form-control">
                                                @error('rpp_12')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_12)
                                                    <p>{{ basename($mapel->rpp_12) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pendukung RPP 12</label>
                                                <input type="file" name="pendukung_rpp_12" class="form-control">
                                                @error('pendukung_rpp_12')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_12)
                                                    <p>{{ basename($mapel->pendukung_rpp_12) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">RPP 13</label>
                                                <input type="file" name="rpp_13" class="form-control">
                                                @error('rpp_13')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->rpp_13)
                                                    <p>{{ basename($mapel->rpp_13) }}</p>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">pendukung RPP 13</label>
                                                <input type="file" name="pendukung_rpp_13" class="form-control">
                                                @error('pendukung_rpp_13')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                                 @if ($mapel->pendukung_rpp_13)
                                                    <p>{{ basename($mapel->pendukung_rpp_13) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-secondary" id="prevButton"
                                    style="display: none;">Previous</button>
                                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                                <button type="submit" class="btn btn-success d-none"
                                    id="submitButton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5'];
            let currentStep = 0;

            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');
            const submitButton = document.getElementById('submitButton');

            const toggleVisibility = (element, condition) => {
                element.style.display = condition ? 'none' : 'inline-block';
            };

            const showStep = (step) => {
                steps.forEach((id, index) => {
                    document.getElementById(id).classList.toggle('d-none', index !== step);
                });
                toggleVisibility(prevButton, step === 0);
                toggleVisibility(nextButton, step === steps.length - 1);
                submitButton.classList.toggle('d-none', step !== steps.length - 1);
            };

            nextButton.addEventListener('click', function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
        });
    </script>
</x-app-layout>
