<?php

namespace App\Http\Controllers;

use App\Models\Employee;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmpController extends Controller
{
    public function view($id){
        $emp=DB::table('employee')->where('id',$id)->first();
        if($emp){
            return view('employees.view')->with('emp',$emp);
        }
    }
    public function createPDF(){
        $data = Employee::all();
        $pdf = PDF::loadView('employees.pdf_view',compact('data'));
        // view()->share('employee',$data);
        // $pdf = PDF::loadView('employees.pdf_view', $data);
        return $pdf->download('pdf_file.pdf');
    }
}
