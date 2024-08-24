<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\administrasi\KepalaLabkom;
use App\Http\Requests\administrasi\KepalaLabKomRequest;

class KepalaLabkomController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');

        $query = KepalaLabkom::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        $kepalaLabKom = $query->paginate(10);

        $tahunAjaranOptions = KepalaLabkom::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('kepalaLabKom.index', compact('kepalaLabKom', 'tahunAjaranFilter', 'tahunAjaranOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kepalaLabKom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KepalaLabKomRequest $request)
    {
        $validateData = $request->validated();

        $fileFields = [
            'tatib_lab',
            'denah_lab',
            'data_lab',
            'data_pengguna',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        KepalaLabkom::create($validateData);

        return redirect()->route('kepalaLabKom.index')->with('success', 'Data created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kepalaLabKom = KepalaLabkom::findOrFail($id);
        return view('kepalaLabKom.edit', compact('kepalaLabKom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KepalaLabKomRequest $request, $id)
    {
        $kepalaLabKom = KepalaLabkom::findOrFail($id);

        $validateData = $request->validated();

        $fileFields = [
            'tatib_lab', 'denah_lab', 'data_lab', 'data_pengguna'
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

        $kepalaLabKom->update($validateData);

        return redirect()->route('kepalaLabKom.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kepalaLabKom = KepalaLabkom::findOrFail($id);

        $fileFields = [
            'tatib_lab', 'denah_lab', 'data_lab', 'data_pengguna'
        ];

        foreach ($fileFields as $fileField) {
            if ($kepalaLabKom->$fileField) {
                Storage::delete($kepalaLabKom->$fileField);
            }
        }

        $kepalaLabKom->delete();

        return redirect()->route('kepalaLabKom.index')->with('success', 'Data deleted successfully.');
    }

    public function downloadFiles($id)
    {
        $kepalaLabKom = KepalaLabkom::findOrFail($id);

        $directories = [
            'tatib_lab', 'denah_lab', 'data_lab', 'data_pengguna'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'KepalaLABKOM_files_' . $kepalaLabKom->tahun_ajaran . '.zip';
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
                if ($kepalaLabKom->$dir) {
                    $filePath = storage_path('app/' . $kepalaLabKom->$dir);
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
