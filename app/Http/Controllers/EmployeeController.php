<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{


    public function index()
    {
        $query = DB::connection('mysql2')->table('plantilla')
            ->where('IDNO', 'NR2019-6657')
            ->get();

        return view('admin.apply-leave', ['employee' => $query]);
    }
}
