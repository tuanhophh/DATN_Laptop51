<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductExportController extends Controller
{

    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ProductExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function import()
    // {
    //     Excel::import(new UsersImport, request()->file('file'));

    //     return back();
    // }
}
