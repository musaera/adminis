<?php

namespace App\Http\Controllers\administrasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\administrasi\Supervisi;
use App\Http\Requests\administrasi\SupervisiRequest;

class SupervisiController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaranFilter = $request->query('tahun_ajaran', '');

        $query = Supervisi::query();

        if ($tahunAjaranFilter) {
            $query->where('tahun_ajaran', $tahunAjaranFilter);
        }

        $supervisi = Supervisi::latest()->paginate(10);

        $tahunAjaranOptions = Supervisi::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('supervisi.index', compact('supervisi', 'tahunAjaranOptions', 'tahunAjaranFilter'));
    }

    public function create()
    {
        return view('supervisi.create');
    }

    public function store(SupervisiRequest $request)
    {
        $validateData = $request->validated();

        Supervisi::create($validateData);

        return redirect()->route('supervisi.index')->with('success', 'Supervisi created successfully.');
    }

    public function edit($id)
    {
        $supervisi = Supervisi::findOrFail($id);
        return view('supervisi.edit', compact('supervisi'));
    }

    public function update(SupervisiRequest $request, $id)
    {
        $supervisi = Supervisi::findOrFail($id);

        $validateData = $request->validated();

        $supervisi->update($validateData);

        return redirect()->route('supervisi.index')->with('success', 'Supervisi updated successfully.');
    }

    public function destroy($id)
    {
        $supervisi = Supervisi::findOrFail($id);

        $supervisi->delete();


        return redirect()->route('supervisi.index')->with('success', 'Supervisi deleted successfully.');
    }
}
