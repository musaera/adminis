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
                            <a href="{{ route('walas.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <h1>Edit Wali Kelas</h1>
                        <form action="{{ route('walas.update', $walas->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card p-3">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Tahun Ajaran</label>
                                        <select class="form-control form-select" name="tahun_ajaran">
                                            <option value="">Pilih Tahun Ajaran</option>
                                            <option value="2024-2025"
                                                {{ $walas->tahun_ajaran == '2024-2025' ? 'selected' : '' }}>2024-2025</option>
                                            <option value="2025-2026"
                                                {{ $walas->tahun_ajaran == '2025-2026' ? 'selected' : '' }}>2025-2026</option>
                                            <option value="2026-2027"
                                                {{ $walas->tahun_ajaran == '2026-2027' ? 'selected' : '' }}>2026-2027</option>
                                            <option value="2027-2028"
                                                {{ $walas->tahun_ajaran == '2027-2028' ? 'selected' : '' }}>2027-2028</option>
                                            <option value="2028-2029"
                                                {{ $walas->tahun_ajaran == '2028-2029' ? 'selected' : '' }}>2028-2029</option>
                                            <option value="2029-2030"
                                                {{ $walas->tahun_ajaran == '2029-2030' ? 'selected' : '' }}>2029-2030</option>
                                        </select>
                                        @error('tahun_ajaran')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Penyerahan Rapor</label>
                                        <input type="file" name="penyerahan_rapor" class="form-control">
                                        @error('penyerahan_rapor')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                        @if ($walas->penyerahan_rapor)
                                            <p>{{ basename($walas->penyerahan_rapor) }}</p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
