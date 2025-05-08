<?php

namespace App\Http\Controllers;

use App\Imports\AltoriesgoImport;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AltoriesgoimportController extends Controller
{
    public function index()
    {
        return view('altoriesgo.import');
    }

    public function show()
    {
        return view('altoriesgo.import');
    }

    public function store(Request $request)
    {
        Excel::import(new AltoriesgoImport, $request->file('file')->store('temp'));
        return redirect()->route('altoriesgo.index')->withStatus('Excel importado correctamente');
    }
}