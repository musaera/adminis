// Migration Mapel
Schema::create('mapels', function (Blueprint $table) {
$table->id();
$table->string('tahun_ajaran');
$table->string('kelas');
$table->string('mapel');
$table->string('kategori_kurikulum');
$table->string('pkg')->nullable();
$table->string('silabus')->nullable();
$table->string('ki_kd_skl')->nullable();
$table->string('kode_etik')->nullable();
$table->string('program_semester')->nullable();
$table->string('program_tahunan')->nullable();
$table->string('kaldik_sekolah')->nullable();
$table->string('jak')->nullable();
$table->string('analisi_waktu')->nullable();
$table->string('daftar_hadir_siswa')->nullable();
$table->string('jadwal_pelajaran')->nullable();
$table->string('kisi_kisi_soal_kartu_soal')->nullable();
$table->text('rpp_1')->nullable();
$table->text('rpp_2')->nullable();
$table->text('rpp_3')->nullable();
$table->text('rpp_4')->nullable();
$table->text('rpp_5')->nullable();
$table->text('rpp_6')->nullable();
$table->text('rpp_7')->nullable();
$table->text('rpp_8')->nullable();
$table->text('rpp_9')->nullable();
$table->text('rpp_10')->nullable();
$table->text('rpp_11)->nullable();
$table->text('rpp_12')->nullable();
$table->text('rpp_13')->nullable();
$table->timestamps();
});

// Models Mapel
protected $fillable = [
'tahun_ajaran',
'kelas',
'mapel',
'kategori_kurikulum',
'pkg',
'silabus',
'ki_kd_skl',
'kode_etik',
'program_semester',
'program_tahunan',
'kaldik_sekolah',
'jak',
'analisi_waktu',
'daftar_hadir_siswa',
'jadwal_pelajaran',
'kisi_kisi_soal_kartu_soal',
'rpp_1',
'rpp_2',
'rpp_3',
'rpp_4',
'rpp_5',
'rpp_6',
'rpp_7',
'rpp_8',
'rpp_9',
'rpp_10',
'rpp_11',
'rpp_12',
'rpp_13',
];

// Controller Store
public function store(Request $request)
{
    // Validasi input
    $validateData = $request->validate([
        'tahun_ajaran' => 'required',
        'kelas' => 'required',
        'mapel' => 'required',
        'kategori_kurikulum' => 'required',
        'pkg' => 'nullable|file|max:2056',
        'silabus' => 'nullable|file|max:2056',
        'ki_kd_skl' => 'nullable|file|max:2056',
        'kode_etik' => 'nullable|file|max:2056',
        'program_semester' => 'nullable|file|max:2056',
        'program_tahunan' => 'nullable|file|max:2056',
        'kaldik_sekolah' => 'nullable|file|max:2056',
        'jak' => 'nullable|file|max:2056',
        'analisi_waktu' => 'nullable|file|max:2056',
        'daftar_hadir_siswa' => 'nullable|file|max:2056',
        'jadwal_pelajaran' => 'nullable|file|max:2056',
        'kisi_kisi_soal_kartu_soal' => 'nullable|file|max:2056',
        'rpp_1.*' => 'nullable|file|max:2056',
        'rpp_2.*' => 'nullable|file|max:2056',
        'rpp_3.*' => 'nullable|file|max:2056',
        'rpp_4.*' => 'nullable|file|max:2056',
        'rpp_5.*' => 'nullable|file|max:2056',
        'rpp_6.*' => 'nullable|file|max:2056',
        'rpp_7.*' => 'nullable|file|max:2056',
        'rpp_8.*' => 'nullable|file|max:2056',
        'rpp_9.*' => 'nullable|file|max:2056',
        'rpp_10.*' => 'nullable|file|max:2056',
        'rpp_11.*' => 'nullable|file|max:2056',
        'rpp_12.*' => 'nullable|file|max:2056',
        'rpp_13.*' => 'nullable|file|max:2056',
    ], [
        'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
        'kelas.required' => 'Kelas harus diisi',
        'mapel.required' => 'Mapel harus diisi',
        'kategori_kurikulum.required' => 'Kategori harus diisi',
    ]);

    $fileFields = [
        'pkg',
        'silabus',
        'ki_kd_skl',
        'kode_etik',
        'program_semester',
        'program_tahunan',
        'kaldik_sekolah',
        'jak',
        'analisi_waktu',
        'daftar_hadir_siswa',
        'jadwal_pelajaran',
        'kisi_kisi_soal_kartu_soal',
        'rpp_1',
        'rpp_2',
        'rpp_3',
        'rpp_4',
        'rpp_5',
        'rpp_6',
        'rpp_7',
        'rpp_8',
        'rpp_9',
        'rpp_10',
        'rpp_11',
        'rpp_12',
        'rpp_13',
    ];

    foreach ($fileFields as $fileField) {
        if (strpos($fileField, 'rpp') !== false && $request->hasFile($fileField)) {
            $rppFiles = [];
            foreach ($request->file($fileField) as $file) {
                $originalName = $file->getClientOriginalName();
                $rppFiles[] = $file->storeAs($fileField, $originalName);
            }
            $validateData[$fileField] = json_encode($rppFiles); // Simpan sebagai JSON
        } elseif ($request->hasFile($fileField)) {
            $file = $request->file($fileField);
            $originalName = $file->getClientOriginalName();
            $validateData[$fileField] = $file->storeAs($fileField, $originalName);
        }
    }

    // Simpan data ke database
    Mapel::create($validateData);
}

// Controller Update
$validateData = $request->validate([
    'tahun_ajaran' => 'required',
    'kelas' => 'required',
    'mapel' => 'required',
    'kategori_kurikulum' => 'required',
    'pkg' => 'nullable|file|max:2056',
    'silabus' => 'nullable|file|max:2056',
    'ki_kd_skl' => 'nullable|file|max:2056',
    'kode_etik' => 'nullable|file|max:2056',
    'program_semester' => 'nullable|file|max:2056',
    'program_tahunan' => 'nullable|file|max:2056',
    'kaldik_sekolah' => 'nullable|file|max:2056',
    'jak' => 'nullable|file|max:2056',
    'analisi_waktu' => 'nullable|file|max:2056',
    'daftar_hadir_siswa' => 'nullable|file|max:2056',
    'jadwal_pelajaran' => 'nullable|file|max:2056',
    'kisi_kisi_soal_kartu_soal' => 'nullable|file|max:2056',
    'rpp_1.*' => 'nullable|file|max:2056',
    'rpp_2.*' => 'nullable|file|max:2056',
    'rpp_3.*' => 'nullable|file|max:2056',
    'rpp_4.*' => 'nullable|file|max:2056',
    'rpp_5.*' => 'nullable|file|max:2056',
    'rpp_6.*' => 'nullable|file|max:2056',
    'rpp_7.*' => 'nullable|file|max:2056',
    'rpp_8.*' => 'nullable|file|max:2056',
    'rpp_9.*' => 'nullable|file|max:2056',
    'rpp_10.*' => 'nullable|file|max:2056',
    'rpp_11.*' => 'nullable|file|max:2056',
    'rpp_12.*' => 'nullable|file|max:2056',
    'rpp_13.*' => 'nullable|file|max:2056',
], [
    'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
    'kelas.required' => 'Kelas harus diisi',
    'mapel.required' => 'Mapel harus diisi',
    'kategori_kurikulum.required' => 'Kategori harus diisi',
]);

$fileFields = [
    'pkg',
    'silabus',
    'ki_kd_skl',
    'kode_etik',
    'program_semester',
    'program_tahunan',
    'kaldik_sekolah',
    'jak',
    'analisi_waktu',
    'daftar_hadir_siswa',
    'jadwal_pelajaran',
    'kisi_kisi_soal_kartu_soal',
    'rpp_1',
    'rpp_2',
    'rpp_3',
    'rpp_4',
    'rpp_5',
    'rpp_6',
    'rpp_7',
    'rpp_8',
    'rpp_9',
    'rpp_10',
    'rpp_11',
    'rpp_12',
    'rpp_13',
];

foreach ($fileFields as $fileField) {
    if (str_starts_with($fileField, 'rpp') && $request->hasFile($fileField)) {
        // Handle multiple files for RPP fields
        $rppFiles = [];
        foreach ($request->file($fileField) as $file) {
            $originalName = $file->getClientOriginalName();
            $rppFiles[] = $file->storeAs($fileField, $originalName);
        }
        $validateData[$fileField] = json_encode($rppFiles); // Save as JSON
    } elseif ($request->hasFile($fileField)) {
        // Handle single file fields
        if (isset($mapel->$fileField) && Storage::exists($mapel->$fileField)) {
            Storage::delete($mapel->$fileField); // Delete old file
        }
        $file = $request->file($fileField);
        $originalName = $file->getClientOriginalName();
        $validateData[$fileField] = $file->storeAs($fileField, $originalName);
    }
}

$mapel->update($validateData);


// index.blade.php

<th>No</th>
<th>Tahun Ajaran</th>
<th>Kelas</th>
<th>Mapel</th>
<th>PKG</th>
<th>Kategori Kurikulum</th>
<th>Silabus</th>
<th>KI KD & SKL</th>
<th>Kode Etik</th>
<th>Program Semester</th>
<th>Program Tahunan</th>
<th>Kaldik Sekolah</th>
<th>JAK</th>
<th>Analisi Waktu</th>
<th>Daftar Hadir Siswa</th>
<th>Jadwal Pelajaran</th>
<th>Kisi-kisi, Soal, Kartu Soal</th>
<th>RPP 1</th>
<th>RPP 2</th>
<th>RPP 3</th>
<th>RPP 4</th>
<th>RPP 5</th>
<th>RPP 6</th>
<th>RPP 7</th>
<th>RPP 8</th>
<th>RPP 9</th>
<th>RPP 10</th>
<th>RPP 11</th>
<th>RPP 12</th>
<th>RPP 13</th>
<th>Aksi</th>

<td>{{ $item->tahun_ajaran }}</td>
<td>{{ $item->kelas }}</td>
<td>{{ $item->mapel }}</td>
<td>{{ $item->kategori_kurikulum }}</td>
<td>{{ Str::limit($item->pkg, 10, '...') }}</td>
<td>{{ Str::limit($item->silabus, 10, '...') }}</td>
<td>{{ Str::limit($item->ki_kd_skl, 10, '...') }}</td>
<td>{{ Str::limit($item->kode_etik, 10, '...') }}</td>
<td>{{ Str::limit($item->program_semester, 10, '...') }}</td>
<td>{{ Str::limit($item->program_tahunan, 10, '...') }}</td>
<td>{{ Str::limit($item->kaldik_sekolah, 10, '...') }}</td>
<td>{{ Str::limit($item->jak, 10, '...') }}</td>
<td>{{ Str::limit($item->analisi_waktu, 10, '...') }}</td>
<td>{{ Str::limit($item->daftar_hadir_siswa, 10, '...') }}</td>
<td>{{ Str::limit($item->jadwal_pelajaran, 10, '...') }}</td>
<td>{{ Str::limit($item->kisi_kisi_soal_kartu_soal, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_1, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_2, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_3, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_4, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_5, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_6, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_7, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_8, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_9, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_10, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_11, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_12, 10, '...') }}</td>
<td>{{ Str::limit($item->rpp_13, 10, '...') }}</td>

// Create.blade.php
// Step2
<div class="mb-3">
<label class="form-label">PKG</label>
<input type="file" name="pkg" class="form-control">
@error('pkg')
<div class="text-danger mt-2"> {{ $message }} </div>
@enderror
</div>

// Step5
<div class="col-sm-6 col-md-4">
<div class="mb-2">
<label class="form-label">RPP 1</label>
<input type="file" name="rpp_1[]" class="form-control" multiple>
@error('rpp_1')
<div class="text-danger mt-2"> {{ $message }} </div>
@enderror
</div>
<div class="mb-3">
<label class="form-label">Pendukung RPP 1</label>
<input type="file" name="rpp_1[]" class="form-control" multiple>
@error('rpp_1')
<div class="text-danger mt-2"> {{ $message }} </div>
@enderror
</div>
</div>

// Edit.blade.php
// Step2
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

// Step5
<div class="col-sm-6 col-md-4">
<div class="mb-2">
<label class="form-label">RPP 1</label>
<input type="file" name="rpp_1[]" class="form-control" multiple>
@error('rpp_1')
<div class="text-danger mt-2">{{ $message }}</div>
@enderror
@if (isset($rppFiles) && count($rppFiles) > 0)
<p>{{ count($rppFiles) }} File</p>
@endif
</div>
<div class="mb-3">
<label class="form-label">Pendukung RPP 1</label>
<input type="file" name="rpp_1[]" class="form-control" multiple>
@error('rpp_1')
<div class="text-danger mt-2">{{ $message }}</div>
@enderror
@if (isset($rppFiles) && count($rppFiles) > 0)
<p>{{ count($rppFiles) }} File</p>
@endif
</div>
</div>

