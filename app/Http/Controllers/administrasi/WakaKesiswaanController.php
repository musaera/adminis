<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\administrasi\WakaKesiswaan;
use App\Http\Requests\administrasi\WakaKesiswaanRequest;

class WakaKesiswaanController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');

        $query = WakaKesiswaan::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        $wakaKesiswaan = WakaKesiswaan::latest()->paginate(10);

        $tahunAjaranOptions = WakaKesiswaan::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('waka_kesiswaan.index', compact('wakaKesiswaan', 'tahunAjaranFilter', 'tahunAjaranOptions'));
    }

    public function create()
    {
        return view('waka_kesiswaan.create');
    }

    public function store(WakaKesiswaanRequest $request)
    {
        $validateData = $request->validated();

        $fileFields = [
            'tahun_pel',
            'piket_gromming'
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        WakaKesiswaan::create($validateData);

        return redirect()->route('waka_kesiswaan.index')->with('success', 'Waka Kesiswaan created successfully.');
    }

    public function edit($id)
    {
        $wakaKesiswaan = WakaKesiswaan::findOrFail($id);
        return view('waka_kesiswaan.edit', compact('wakaKesiswaan'));
    }

    public function update(WakaKesiswaanRequest $request, $id)
    {
        $wakaKesiswaan = WakaKesiswaan::findOrFail($id);

        $validateData = $request->validated();

        $fileFields = [
            'tahun_pel',
            'piket_gromming'
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

        $wakaKesiswaan->update($validateData);

        return redirect()->route('waka_kesiswaan.index')->with('success', 'Waka Kesiswaan updated successfully.');
    }

    public function destroy($id)
    {
        $wakaKesiswaan = WakaKesiswaan::find($id);

        $fileFields = [
            'tahun_pel',
            'piket_gromming'
        ];

        foreach ($fileFields as $fileField) {
            if ($wakaKesiswaan->$fileField) {
                Storage::delete($wakaKesiswaan->$fileField);
            }
        }

        // Hapus data dari database
        $wakaKesiswaan->delete();

        return redirect()->route('waka_kesiswaan.index')
            ->with('success', 'Data Waka Kesiswaan berhasil dihapus.');
    }

    public function downloadFiles($id)
    {
        $wakaKesiswaan = WakaKesiswaan::findOrFail($id);

        $directories = [
            'tahun_pel',
            'piket_gromming'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'WakaKesiswaan_files_' . $wakaKesiswaan->tahun_ajaran . '.zip';
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
                if ($wakaKesiswaan->$dir) {
                    $filePath = storage_path('app/' . $wakaKesiswaan->$dir);
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

    public function exportPDF($id)
    {
        $data = WakaKesiswaan::findOrFail($id);
        $pdf = PDF::loadView('waka_kesiswaan.pdf', compact('data'));
        return $pdf->download('waka_kesiswaan.pdf');
    }
}
