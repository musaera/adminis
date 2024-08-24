<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use App\Models\administrasi\Mapel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\administrasi\MapelRequest;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');
        $kelasFilter = $request->query('kelas', '');
        $mapelFilter = $request->query('mapel', '');

        $query = Mapel::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        if ($kelasFilter) {
            $query->where('kelas', $kelasFilter);
        }

        if ($mapelFilter) {
            $query->where('mapel', $mapelFilter);
        }

        $mapels = $query->paginate(10);

        $tahunAjaranOptions = Mapel::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');
        $kelasOptions = Mapel::select('kelas')->distinct()->pluck('kelas');
        $mapelOptions = Mapel::select('mapel')->distinct()->pluck('mapel');

        // return view('page.mapel.index', compact('mapels', 'tahunAjaranFilter', 'kelasFilter', 'mapelFilter', 'tahunAjaranOptions', 'kelasOptions', 'mapelOptions'));
        return view('mapel.index', compact('mapels', 'tahunAjaranFilter', 'kelasFilter', 'mapelFilter', 'tahunAjaranOptions', 'kelasOptions', 'mapelOptions'));
    }


    public function create()
    {
        // return view('page.mapel.create');
        return view('mapel.create');
    }

    public function store(MapelRequest $request)
    {
        // Validasi input
        $validateData = $request->validated();

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
            'pendukung_rpp_1',
            'rpp_2',
            'pendukung_rpp_2',
            'rpp_3',
            'pendukung_rpp_3',
            'rpp_4',
            'pendukung_rpp_4',
            'rpp_5',
            'pendukung_rpp_5',
            'rpp_6',
            'pendukung_rpp_6',
            'rpp_7',
            'pendukung_rpp_7',
            'rpp_8',
            'pendukung_rpp_8',
            'rpp_9',
            'pendukung_rpp_9',
            'rpp_10',
            'pendukung_rpp_10',
            'rpp_11',
            'pendukung_rpp_11',
            'rpp_12',
            'pendukung_rpp_12',
            'rpp_13',
            'pendukung_rpp_13',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        // Simpan data ke database
        Mapel::create($validateData);

        return redirect()->route('mapel.index')->with('success', 'Mapel created successfully.');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        // $rppFiles = Storage::files('rpp');

        // return view('page.mapel.edit', compact('mapel', 'rppFiles'));
        return view('mapel.edit', compact('mapel'));
    }

    public function update(MapelRequest $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $validateData = $request->validated();

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
            if ($request->hasFile($fileField)) {
                // Jika ada file baru, hapus file lama jika ada
                if (isset($validateData[$fileField])) {
                    $oldFile = $validateData[$fileField];
                    if ($oldFile && Storage::exists($oldFile)) {
                        Storage::delete($oldFile);
                    }
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            } else {
                // Jika tidak ada file baru, pertahankan data lama
                if (isset($validateData[$fileField])) {
                    $validateData[$fileField] = $validateData[$fileField];
                }
            }
        }

        $mapel->update($validateData);

        return redirect()->route('mapel.index')->with('success', 'Mapel updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan mapel berdasarkan ID
        $mapel = Mapel::findOrFail($id);

        // Define file fields
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
            'pendukung_rpp_1',
            'rpp_2',
            'pendukung_rpp_2',
            'rpp_3',
            'pendukung_rpp_3',
            'rpp_4',
            'pendukung_rpp_4',
            'rpp_5',
            'pendukung_rpp_5',
            'rpp_6',
            'pendukung_rpp_6',
            'rpp_7',
            'pendukung_rpp_7',
            'rpp_8',
            'pendukung_rpp_8',
            'rpp_9',
            'pendukung_rpp_9',
            'rpp_10',
            'pendukung_rpp_10',
            'rpp_11',
            'pendukung_rpp_11',
            'rpp_12',
            'pendukung_rpp_12',
            'rpp_13',
            'pendukung_rpp_13',
        ];

        foreach ($fileFields as $fileField) {
            if ($mapel->$fileField) {
                Storage::delete($mapel->$fileField);
            }
        }

        // Hapus entri dari database
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mapel deleted successfully.');
    }

    public function downloadFiles($id)
    {
        $mapel = Mapel::findOrFail($id);

        $directories = [
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
            'pendukung_rpp_1',
            'rpp_2',
            'pendukung_rpp_2',
            'rpp_3',
            'pendukung_rpp_3',
            'rpp_4',
            'pendukung_rpp_4',
            'rpp_5',
            'pendukung_rpp_5',
            'rpp_6',
            'pendukung_rpp_6',
            'rpp_7',
            'pendukung_rpp_7',
            'rpp_8',
            'pendukung_rpp_8',
            'rpp_9',
            'pendukung_rpp_9',
            'rpp_10',
            'pendukung_rpp_10',
            'rpp_11',
            'pendukung_rpp_11',
            'rpp_12',
            'pendukung_rpp_12',
            'rpp_13',
            'pendukung_rpp_13',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Mapel_files_' . $mapel->mapel . '.zip';
        $zipFilePath = storage_path('app/' . $zipFileName);

        // Ensure the Storage directory exists
        if (!Storage::exists('Storage')) {
            Storage::makeDirectory('Storage');
            Log::info('Created Storage directory: ' . storage_path('app'));
        }

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($mapel->$dir) {
                    $filePath = storage_path('app/' . $mapel->$dir);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, $dir . '/' . basename($filePath));
                    }
                }
            }
            $zip->close();

            // Download the created zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Failed to create zip file');
        }
    }
}
