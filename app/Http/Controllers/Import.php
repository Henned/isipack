<?php

namespace App\Http\Controllers;

use Excel;
use Illuminate\Http\Request;
use App\Imports\ProductImport;

class Import extends Controller
{
    public function create(Request $request) 
    {
        $file = $request->file('excel');
        Excel::import(new ProductImport, $file);
        
        return redirect(route('admin.dashboard'))->with('success', 'All good!');
    }
}
