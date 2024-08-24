<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\administrasi\WaliKelas;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\administrasi\WaliKelasRequest;

class WaliKelasController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->get('tahun_ajaran', '');

        // Query to fetch walas data
        $query = WaliKelas::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        // Paginate the results
        $walas = $query->paginate(10);

        // Fetch distinct tahun ajaran options for the filter dropdown
        $tahunAjaranOptions = WaliKelas::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        // Return the view with the required data
        return view('walas.index', compact('walas', 'tahunAjaranOptions', 'tahunAjaranFilter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('walas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaliKelasRequest $request)
    {
        $validateData = $request->validated();

        $fileFields = [
            'penyerahan_rapor',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        WaliKelas::create($validateData);

        return redirect()->route('walas.index')->with('success', 'Wali Kelas created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $walas = WaliKelas::findOrFail($id);
        return view('walas.edit', compact('walas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaliKelasRequest $request, $id)
    {
        $walas = WaliKelas::findOrFail($id);

        $validateData = $request->validated();

        $fileFields = [
            'penyerahan_rapor'
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

        $walas->update($validateData);

        return redirect()->route('walas.index')->with('success', 'Wali Kelas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $walas = WaliKelas::findOrFail($id);

        $fileFields = [
            'penyerahan_rapor'
        ];

        foreach ($fileFields as $fileField) {
            if ($walas->$fileField) {
                Storage::delete($walas->$fileField);
            }
        }

        $walas->delete();

        return redirect()->route('walas.index')->with('success', 'Wali Kelas deleted successfully.');
    }

    public function downloadFile($id)
    {
        $walas = WaliKelas::findOrFail($id);

        $directories = [
            'penyerahan_rapor'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'WaliKelas_files_' . $walas->tahun_ajaran . '.zip';
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
                if ($walas->$dir) {
                    $filePath = storage_path('app/' . $walas->$dir);
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
