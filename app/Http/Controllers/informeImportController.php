<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\InformeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class informeImportController extends Controller
{
    public function index()
    {
        return view('.import');
    }

    public function show()
    {
        return view('informe.index');
    }

    public function store(Request $request)
    {
        Excel::import(new InformeImport, $request->file('file')->store('temp'));
        return redirect()->route('informe.index')->withStatus('Excel importado correctamente');
    }
}
