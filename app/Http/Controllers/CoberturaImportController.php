<?php

namespace App\Http\Controllers;

use App\Imports\CoberturaImport;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoberturaImportController extends Controller
{
    public function index()
    {
        return view('cobertura.import');
    }

    public function show()
    {
        return view('cobertura.import');
    }

    public function store(Request $request)
    {
        Excel::import(new CoberturaImport, $request->file('file')->store('temp'));
        return redirect()->route('cobertura.index')->withStatus('Excel importado correctamente');
    }
}
