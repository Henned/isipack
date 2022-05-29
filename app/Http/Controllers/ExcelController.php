<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Imports\CategoryImport;

class ExcelController extends Controller
{
    public function import(Request $request) 
    {
        $file = $request->file('excel');
        Excel::import(new CategoryImport, $file);
        Excel::import(new ProductImport, $file);
        
        return redirect(route('admin.dashboard'))->with('success', 'All good!');
    }

    public function export()
    {
        $today = Carbon::today();
        return Excel::download(new ProductExport, 'Preisliste vom ' .date('d-m-Y', strtotime($today)) . '.xlsx');
    }
}
