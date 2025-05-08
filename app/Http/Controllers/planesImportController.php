<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\PlanesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class planesImportController extends Controller
{
    public function index()
    {
        return view('planes.import');
    }

    public function show()
    {
        return view('planes.import');
    }

    public function store(Request $request)
    {
        Excel::import(new PlanesImport, $request->file('file')->store('temp'));
        return redirect()->route('planes.index')->withStatus('Excel importado correctamente');
    }
}
