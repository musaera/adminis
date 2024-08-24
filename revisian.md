    public function downloadFiles($id)
    {
        $wakaKesiswaan = WakaKesiswaan::findOrFail($id);

        $directories = [
            'tahun_pel',
            'piket_gromming'
        ];

        // Create a temporary file to store the zip in public/storage
        $zipFileName = 'WakaKesiswaan_files_' . $wakaKesiswaan->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the storage directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($wakaKesiswaan->$dir) {
                    $filePath = public_path('storage/' . $wakaKesiswaan->$dir);
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


    public function downloadFiles($id)
    {
        $kepalaLabKom = KepalaLabkom::findOrFail($id);

        $directories = [
            'tatib_lab', 'denah_lab', 'data_lab', 'data_pengguna'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'KepalaLABKOM_files_' . $kepalaLabKom->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($kepalaLabKom->$dir) {
                    $filePath = public_path('storage/' . $kepalaLabKom->$dir);
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


    public function downloadFiles($id)
    {
        $kepsek = Kepsek::findOrFail($id);

        $directories = [
            'proker_kepsek',
            'rkts',
            'rkjm',
            'prog_jangka_panjang',
            'rapbs',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Kepsek_files_' . $kepsek->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($kepsek->$dir) {
                    $filePath = public_path('storage/' . $kepsek->$dir);
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


    public function downloadFiles($id)
    {
        $mapel = Mapel::findOrFail($id);

        $directories = [
            'rpp', 'silabus', 'ki_kd_skl', 'kode_etik',
            'program_semester', 'program_tahunan', 'kaldik_sekolah',
            'jak', 'analisi_waktu', 'daftar_hadir_siswa',
            'jadwal_pelajaran', 'kisi_kisi_soal_kartu_soal', 'pkg'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Mapel_files_' . $mapel->mapel . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($mapel->$dir) {
                    $files = json_decode($mapel->$dir);
                    if (is_array($files)) {
                        foreach ($files as $file) {
                            $filePath = public_path('storage/' . $file);
                            if (file_exists($filePath)) {
                                $zip->addFile($filePath, $dir . '/' . basename($filePath));
                            }
                        }
                    } else {
                        $filePath = public_path('storage/' . $mapel->$dir);
                        if (file_exists($filePath)) {
                            $zip->addFile($filePath, $dir . '/' . basename($filePath));
                        }
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


    public function downloadFiles($id)
    {
        $osis = Osis::findOrFail($id);

        $directories = [
            'struktur_organisasi', 'pengurus', 'program', 'pelaksanaan_dan_dokumentasi'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'Osis_files_' . $osis->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($osis->$dir) {
                    $filePath = public_path('storage/' . $osis->$dir);
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
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($perpustakaan->$dir) {
                    $filePath = public_path('storage/' . $perpustakaan->$dir);
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


    public function downloadFiles($id)
    {
        $wakaKurikulum = WakaKurikulum::findOrFail($id);

        $directories = [
            'kenaikan_kelas'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'WakaKurikulum_files_' . $wakaKurikulum->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($wakaKurikulum->$dir) {
                    $filePath = public_path('storage/' . $wakaKurikulum->$dir);
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


    public function downloadFile($id)
    {
        $walas = WaliKelas::findOrFail($id);

        $directories = [
            'penyerahan_rapor'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'WaliKelas_files_' . $walas->tahun_ajaran . '.zip';
        $zipFilePath = public_path('storage/' . $zipFileName);

        // Ensure the public directory exists
        if (!Storage::exists('public')) {
            Storage::makeDirectory('public');
            Log::info('Created public directory: ' . public_path('storage'));
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($walas->$dir) {
                    $filePath = public_path('storage/' . $walas->$dir);
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




