<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\administrasi\Perpustakaan;
use App\Http\Requests\administrasi\PerpustakaanRequest;

class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');

        $query = Perpustakaan::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        $perpustakaan = Perpustakaan::latest()->paginate(10);

        $tahunAjaranOptions = Perpustakaan::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('perpustakaan.index', compact('perpustakaan', 'tahunAjaranOptions', 'tahunAjaranFilter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perpustakaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerpustakaanRequest $request)
    {
        $validateData = $request->validated();

        $fileFields = [
            'tatib_perpustakaan',
            'denah_perpustakaan',
            'daftar_buku',
            'proker_perpus',
            'struktur',
            'sk',
            'daftar_pengunjung',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        Perpustakaan::create($validateData);

        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);
        return view('perpustakaan.edit', compact('perpustakaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerpustakaanRequest $request, $id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);

        $validateData = $request->validated();

        $fileFields = [
            'tatib_perpustakaan',
            'denah_perpustakaan',
            'daftar_buku',
            'proker_perpus',
            'struktur',
            'sk',
            'daftar_pengunjung',
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

        $perpustakaan->update($validateData);

        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);

        $fileFields = [
            'tatib_perpustakaan',
            'denah_perpustakaan',
            'daftar_buku',
            'proker_perpus',
            'struktur',
            'sk',
            'daftar_pengunjung',
        ];

        foreach ($fileFields as $fileField) {
            if ($perpustakaan->$fileField) {
                Storage::delete($perpustakaan->$fileField);
            }
        }

        $perpustakaan->delete();


        return redirect()->route('perpustakaan.index')->with('success', 'Perpustakaan deleted successfully.');
    }

    public function downloadFiles($id)
    {
        $perpustakaan = Perpustakaan::findOrFail($id);

        $directories = [
            'tatib_perpustakaan',
            'denah_perpustakaan',
            'daftar_buku',
            'proker_perpus',
           'struktur',
           'sk',
            'daftar_pengunjung',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Perpustakaan_files_' . $perpustakaan->tahun_ajaran . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
            Log::info('Created temp directory: ' . storage_path('app/temp'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($perpustakaan->$dir) {
                    $filePath = storage_path('app/' . $perpustakaan->$dir);
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
