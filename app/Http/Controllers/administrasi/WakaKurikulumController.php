<?php

namespace App\Http\Controllers\administrasi;

use ZipArchive;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\administrasi\WakaKurikulum;
use App\Http\Requests\administrasi\WakaKurikulumRequest;

class WakaKurikulumController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');

        $query = WakaKurikulum::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        $wakaKurikulum = WakaKurikulum::latest()->paginate(10);

        $tahunAjaranOptions = WakaKurikulum::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('waka_kurikulum.index', compact('wakaKurikulum', 'tahunAjaranOptions', 'tahunAjaranFilter'));
    }

    public function create()
    {
        return view('waka_kurikulum.create');
    }

    public function store(WakaKurikulumRequest $request)
    {
        $validateData = $request->validate();


        $fileFields = [
            'kelas_10',
            'kelas_11',
            'kelas_12',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName);
            }
        }

        WakaKurikulum::create($validateData);

        return redirect()->route('waka_kurikulum.index')
            ->with('success', 'Data Waka Kurikulum berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $wakaKurikulum = WakaKurikulum::findOrFail($id);
        return view('waka_kurikulum.edit', compact('wakaKurikulum'));
    }

    public function update(WakaKurikulumRequest $request, $id)
    {
        $wakaKurikulum = WakaKurikulum::findOrFail($id);

        $validateData = $request->validated();

        $fileFields = [
            'kelas_10',
            'kelas_11',
            'kelas_12',
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

        $wakaKurikulum->update($validateData);

        return redirect()->route('waka_kurikulum.index')
            ->with('success', 'Data Waka Kurikulum berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $wakaKurikulum = WakaKurikulum::find($id);

        $fileFields = [
            'kelas_10',
            'kelas_11',
            'kelas_12',
        ];

        foreach ($fileFields as $fileField) {
            if ($wakaKurikulum->$fileField) {
                Storage::delete($wakaKurikulum->$fileField);
            }
        }

        // Hapus data dari database
        $wakaKurikulum->delete();

        return redirect()->route('waka_kurikulum.index')
            ->with('success', 'Data Waka Kurikulum berhasil dihapus.');
    }

    public function exportPDF($id)
    {
        $data = WakaKurikulum::findOrFail($id);
        $pdf = Pdf::loadView('waka_kurikulum.pdf', compact('data'));
        return $pdf->download('waka_kurikulum.pdf');
    }

    public function downloadFile($id)
    {
        $wakaKurikulum = WakaKurikulum::findOrFail($id);

        $directories = [
            'kelas_10',
            'kelas_11',
            'kelas_12',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'WakaKurikulum_files_' . $wakaKurikulum->tahun_ajaran . '.zip';
        $zipFilePath = storage_path('app/' . $zipFileName);

        // Ensure the Storage directory exists
        if (!Storage::exists('Storage')) {
            Storage::makeDirectory('Storage');
            Log::info('Created Storage directory: ' . storage_path('app'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($wakaKurikulum->$dir) {
                    $filePath = storage_path('app/' . $wakaKurikulum->$dir);
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
